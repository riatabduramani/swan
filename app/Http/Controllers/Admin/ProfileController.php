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

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('admin.profile.profile',compact('user'));
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
        ]);

        try {
              $input = $request->all();
                if(!empty($input['password'])){

                	$this->validate($request, [
			            'password' => 'min:6|same:confirm-password',
			        ]);

                    $input['password'] = Hash::make($input['password']);
                }else{
                    $input = array_except($input,array('password'));    
                }

                $user = User::find($id);
                $user->update($input);

                return redirect('admin/profile/')
                                ->with('flash_message','Your profile updated successfully');
            
        } catch (Exception $e) {
            return redirect('admin/profile/')
                                ->with('flash_error','Error while updating your profile!');
        }
      
    }


}