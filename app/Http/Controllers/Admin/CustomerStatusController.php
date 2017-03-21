<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CustomerStatus;
use Illuminate\Http\Request;
use Session;

class CustomerStatusController extends Controller
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
            $customerstatus = CustomerStatus::where('name', 'LIKE', "%$keyword%")
				
                ->paginate($perPage);
        } else {
            $customerstatus = CustomerStatus::paginate($perPage);
        }

        return view('admin.customer-status.index', compact('customerstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.customer-status.create');
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
        
        $requestData = $request->all();
        
        CustomerStatus::create($requestData);

        Session::flash('flash_message', 'CustomerStatus added!');

        return redirect('admin/customer-status');
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
        $customerstatus = CustomerStatus::findOrFail($id);

        return view('admin.customer-status.edit', compact('customerstatus'));
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
        
        $requestData = $request->all();
        
        $customerstatus = CustomerStatus::findOrFail($id);
        $customerstatus->update($requestData);

        Session::flash('flash_message', 'CustomerStatus updated!');

        return redirect('admin/customer-status');
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
        CustomerStatus::destroy($id);

        Session::flash('flash_message', 'CustomerStatus deleted!');

        return redirect('admin/customer-status');
    }
}
