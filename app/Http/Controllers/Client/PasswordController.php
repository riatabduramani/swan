<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Document;
use App\Models\Credits;
use File;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
	public function index() {
    	$customer = Customer::findOrFail(Auth::user()->customer->id);

    	return view('frontend.panel.password', compact('customer'));
    }

     public function update(Request $request, $id) {

            $userid = Auth::user()->id;
            $customer = Customer::findOrFail($id);

            $user = User::findOrFail($customer->user_id);
        	$this->validate($request, [
        	'password' => 'required|min:6|confirmed',
    		]);

        	$user->password = bcrypt($request->password);	
            
            $user->update();

        Session::flash('flash_message', 'Your password has been changed successfully!');

        return back();
    }
}
