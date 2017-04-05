<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\Customer;
use App\Models\Invoice;
use App\User;
use Session;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    

    public function index(Request $request) {

        $keyword = $request->get('search');
        $status = $request->get('status');
        $confirmed = $request->get('confirmed');
        $perPage = 25;

        if (!empty($keyword)) {
            $customer = Customer::whereHas('user', function ($query) use($keyword) {
                    $query->where('name', 'like', "%$keyword%")
                        ->orWhere('surname','like',"%$keyword%")
                        ->orWhere('email','like',"%$keyword%");
                })->paginate($perPage);
        } elseif(!empty($status)) {
            $customer = Customer::whereHas('user', function ($query) use($status) {
                    $query->where('status', $status);
                })->paginate($perPage);
        } elseif(!empty($confirmed)) {
            $customer = Customer::whereHas('user', function ($query) use($confirmed) {
                    $query->where('confirmed', $confirmed);
                })->paginate($perPage);
        } else {
            $customer = Customer::paginate($perPage);
        }

        return view('admin.customer.index', compact('customer','status', 'confirmed'));
    }

    public function edit($id) {
    
        $customer = Customer::findOrFail($id);
        $country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $district = District::where('city_id', 1)->pluck('name','id');

        return view('admin.customer.edit', compact('customer','country', 'city', 'district'));
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
            'status' => 'required',
            'confirmed' => 'required',
            'district_in_id' => 'required',
        ]);

        if(isset($request)) {

            $userid = Auth::user()->id;

            $customer = Customer::findOrFail($id);
            $customer->address_out = $request->address_out;
            $customer->city = $request->city;
            $customer->country_in_id = $request->country_in_id;
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
            $user->email = $request->email;
            //$user->password = bcrypt(str_random(8));

            $user->status = $request->status;
            $user->confirmed = $request->confirmed;
            $user->update();
        }

        Session::flash('flash_message', 'Customer updated successfully!');

        return redirect('admin/customer/'.$id.'/edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $country = Country::pluck('name','id');
        $city = City::pluck('name','id');
        $district = District::where('city_id', 1)->pluck('name','id');

        return view('admin.customer.create', compact('country', 'city', 'district'));
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
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'email' => 'required|email|max:255|unique:users',
            'phone_out' => 'required|min:3',
            'phone_in' => 'required|min:3',
            'address_out' => 'required|min:3',
            'postal_out' => 'required|min:3',
            'city' => 'required|min:3',
            'address_in' => 'required|min:6',
            'status' => 'required',
            'confirmed' => 'required',
            'district_in_id' => 'required',
        ]);

        if(isset($request)) {

            $userid = Auth::user()->id;

            $user = new User();
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->password = bcrypt(str_random(8));
            $user->status = $request->status;
            $user->confirmed = $request->confirmed;
            $user->save();
            $lastid = $user->id;

            $user->attachRole(3, $lastid);

            $customer = new Customer();
            $customer->user_id = $lastid;
            $customer->address_out = $request->address_out;
            $customer->city = $request->city;
            $customer->country_in_id = $request->country_in_id;
            $customer->postal_out = $request->postal_out;
            $customer->phone_out = $request->phone_out;
            $customer->address_in = $request->address_in;
            $customer->district_in_id = $request->district_in_id;
            $customer->city_in_id = $request->city_in_id;
            $customer->country_id = $request->country_id;
            $customer->phone_in = $request->phone_in;
            $customer->emergencycontact = $request->emergencycontact;
            $customer->emergencyphone = $request->emergencyphone;
            $customer->created_by = $userid;
            $customer->save();

        }
        
        Session::flash('flash_message', 'Customer created successfully!');

        return redirect('admin/customer/');
    }

    public function show($id) {

        $customer = Customer::with('cities','district','invoice')->findOrFail($id);
        //$invoices = Invoice::with('customer')->findOrFail();

        return view('admin.customer.show', compact('customer'));
    }

    public function destroy($id) {

        $customer = Customer::findOrFail($id);
        $user = $customer->user->id;
        User::destroy($user);

        Session::flash('flash_message', 'Customer deleted successfully!');
        return redirect('admin/customer');
    }

}



