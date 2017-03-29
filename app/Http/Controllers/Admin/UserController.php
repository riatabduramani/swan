<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use DB;
use Hash;
use Alert;
use Auth;
use Redirect;
use Session;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userid = Auth::user()->id;
        $keyword = $request->get('search');
        $filterstatus = $request->get('is_active');
        $perPage = 25;

        
        if (!empty($keyword)) {
            $data = User::where('name', 'LIKE', "%$keyword%")
                        ->orWhere('surname', 'LIKE', "%$keyword%")
                        ->orWhere('email', 'LIKE', "%$keyword%")
                        ->whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee');
                        })->paginate($perPage);

        } elseif(!empty($filterstatus)) {

            $data = User::where('status', $filterstatus)
                        ->whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee');
                        })->paginate($perPage);

        }  
        else {
             $data = User::whereHas('roles', function($q)
                {
                    $q->where('name', 'employee');
                })->paginate($perPage);
        }
        

        

        return view('admin.users.index',compact('data','filterstatus'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

         return redirect('admin/users/')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!empty($user->business->id)) {

        $countryid = $user->business->country_id;
        $country = Country::where('id', '=', $countryid)->get();
        
        return view('admin.users.show',compact('user', 'country'));
        } else {
            return view('admin.users.show',compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('admin.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'confirmed' => 'required',
            'status' => 'required'
        ]);

        try {
              $input = $request->all();
                if(!empty($input['password'])){ 
                    $input['password'] = Hash::make($input['password']);
                }else{
                    $input = array_except($input,array('password'));    
                }

                $user = User::find($id);
                $user->update($input);
                DB::table('role_user')->where('user_id',$id)->delete();
                
                foreach ($request->input('roles') as $key => $value) {
                    $user->attachRole($value);
                }

                return redirect('admin/users/')
                                ->with('success','User updated successfully');
            
        } catch (Exception $e) {
            return redirect('admin/users/')
                                ->with('error','Error while updating user!');
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('admin/users/')
                        ->with('success','User deleted successfully');
    }

}