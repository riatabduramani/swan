<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/panel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->customer()->save(new Customer ([
            'user_id' => $user->id,
            'phone_out' => $data['phone_out'],
            'phone_in' => $data['phone_in'],
            'address_out' => $data['address_out'],
            'postal_out' => $data['postal_out'],
            'city' => $data['city'],
            'country_id' => $data['country_id'],
            'address_in' => $data['address_in'],
            'city_in_id' => $data['city_in_id'],
            'district_in_id' => $data['district_in_id'],
            'country_in_id' => $data['country_in_id'],
            'emergencycontact' => $data['emergencycontact'],
            'emergencyphone' => $data['emergencyphone'],
            'created_by' => 'Web',
        ]));

        $user->attachRole('4');
        

        return $user;
    }
}
