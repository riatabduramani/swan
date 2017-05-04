<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Credits;
use App\User;
use Session;
use Auth;

class CreditsController extends Controller
{
    public function create() {

    }

    public function store(Request $request) {
    		$credit = new Credits;
            $credit->customer_id = $request->customer_id;
            $credit->amount     = $request->amount;
            $credit->balance     = $request->amount;
            $credit->notes     = $request->notes;
            $credit->created_by = Auth::user()->id;
            $credit->save();

            Session::flash('flash_message', 'Credit has been added!');
            return redirect()->back();
    }

    public function edit($id) {
    	$credit = Credits::findOrFail($id);
        return view('admin.credits.edit', compact('credit'));
    }

    public function update($id, Request $request) {
    	$credit = Credits::findOrFail($id);

	    $input = $request->all();

	    $credit->fill($input)->save();

	    Session::flash('flash_message', 'Credit successfully updated!');

	    return redirect('admin/customer/'.$request->customer_id);
	}

    public function destroy($id) {
    	Credits::destroy($id);
        Session::flash('flash_message', 'The Credit has been deleted!');
        return redirect()->back();
    }

}
