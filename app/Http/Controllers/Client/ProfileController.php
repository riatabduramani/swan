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

class ProfileController extends Controller
{

    public function index() {
    	$customer = Customer::findOrFail(Auth::user()->customer->id);
    	$country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $district = District::where('city_id', 1)->pluck('name','id');

    	return view('frontend.panel.profile', compact('customer','country', 'city', 'district'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'phone_out' => 'required|min:3',
            'phone_in' => 'required|min:3',
            'address_out' => 'required|min:3',
            'postal_out' => 'required|min:3',
            'city' => 'required|min:3',
            'address_in' => 'required|min:6',
            'district_in_id' => 'required',
        ]);

        if(isset($request)) {

            $userid = Auth::user()->id;

            $customer = Customer::findOrFail($id);
            $customer->address_out = $request->address_out;
            $customer->city = $request->city;
            $customer->postal_out = $request->postal_out;
            $customer->phone_out = $request->phone_out;
            $customer->address_in = $request->address_in;
            $customer->district_in_id = $request->district_in_id;
            $customer->city_in_id = $request->city_in_id;
            $customer->country_id = $request->country_id;
            $customer->phone_in = $request->phone_in;
            $customer->emergencycontact = $request->emergencycontact;
            $customer->emergencyphone = $request->emergencyphone;
            $customer->updated_by = $userid;
            $customer->update();

            $user = User::findOrFail($customer->user_id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->update();

        }

        Session::flash('flash_message', __('messages.profileupdate'));

        return back();
    }
}
