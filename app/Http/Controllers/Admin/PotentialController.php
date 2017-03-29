<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Potential;
use App\Models\Comment;
use App\Models\CustomerStatus;
use Illuminate\Http\Request;
use Session;

class PotentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $potential = Potential::where('name', 'LIKE', "%$keyword%")
				->orWhere('surname', 'LIKE', "%$keyword%")
				->orWhere('phone', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('district', 'LIKE', "%$keyword%")
				->orWhere('contacted_at', 'LIKE', "%$keyword%")
				->orWhere('customer_status_id', 'LIKE', "%$keyword%")
				->orWhere('comment_id', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $potential = Potential::paginate($perPage);
        }
        
        return view('admin.potential.index', compact('potential'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $customerstatus = CustomerStatus::pluck('name', 'id');

        return view('admin.potential.create', compact('customerstatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'district' => 'required',
        ]);
        
        $potentional = new Potential();
        $potentional->name = $request->name;
        $potentional->surname = $request->surname;
        $potentional->phone = $request->phone;
        $potentional->email = $request->email;
        $potentional->district = $request->district;
        $potentional->customer_status_id = $request->customer_status_id;
        $potentional->created_by = Auth::user()->id;
        $potentional->save();

        $lastinsertedid = $potentional->id;

        $topic = Potential::find($lastinsertedid);

        $topic->comments()->create([
            'body' => $request->comment,
            'commentable_id' => $lastinsertedid,
            'commentable_type' => get_class($potentional),
            'created_by' => Auth::user()->id
        ]);

        Session::flash('flash_message', 'Potential customer added!');

        return redirect('admin/potential');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $potential = Potential::findOrFail($id);
        $customerstatus = CustomerStatus::pluck('name', 'id');

        return view('admin.potential.show', compact('potential', 'customerstatus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $potential = Potential::findOrFail($id);
        $customerstatus = CustomerStatus::pluck('name', 'id');

        return view('admin.potential.edit', compact('potential', 'customerstatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'district' => 'required',
        ]);
        
        $potential = Potential::findOrFail($id);

        $potential->name = $request->name;
        $potential->surname = $request->surname;
        $potential->phone = $request->phone;
        $potential->email = $request->email;
        $potential->district = $request->district;
        $potential->customer_status_id = $request->customer_status_id;
        $potential->updated_by = Auth::user()->id;

        $potential->update();

        if(isset($request->comment)){
            $potential->comments()->create([
                'body' => $request->comment,
                'commentable_id' => $id,
                'commentable_type' => get_class($potential),
                'created_by' => Auth::user()->id
            ]);
        }

        Session::flash('flash_message', 'Potential customer updated!');

        return redirect('admin/potential');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Potential::destroy($id);

        Session::flash('flash_message', 'Potential customer deleted!');

        return redirect('admin/potential');
    }
}
