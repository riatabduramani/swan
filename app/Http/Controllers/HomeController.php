<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\City;
use App\Models\District;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Document;
use App\Models\Credits;
use App\Models\Service;
use App\Models\Packet;
use App\Models\Settings;
use App\Models\Subscriber;
use File;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Alert;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::translated()->get();

        return view('frontend.index', compact('services'));
    }

    public function services() {
        $services = Service::translated()->get();
        return view('frontend.pages.services', compact('services'));
    }

    public function getServices($id) {
        $services = Packet::findOrFail($id);
        //$services = Service::translated()->findOrFail($id);
        return view('frontend.pages.showservices', compact('services'));
    }

    public function footer() {
        $packets = Packet::translated()->get();
        //$settings = Settings::translated()->first();
        return view('frontend.footer', compact('packets'));
    }

    public function contactus(Request $request) {

             $this->validate($request, [
                'email' => 'required|email',
            ]);

            $email = $request->get('email');
            \Mail::send('emails.contactus',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'address' => $request->get('address'),
                'user_message' => $request->get('message')
            ), function($message) use($email)
            {
                $message->from($email);
                $message->to(env('OFFICIAL_MAIL'), 'SWAN')->subject(__('front.contactsubject'));
            });

            //Session::flash('flash_message', __('front.thankscontact'));

            alert()->success(__('front.thankscontact'), __('front.messagesent'));


            return redirect()->back();
    }

    public function contact(Request $request) {

            $this->validate($request, [
                'contact_email' => 'required|email',
            ]);

            $email = $request->get('contact_email');
            \Mail::send('emails.contact',
            array(
                'name' => $request->get('contact_name'),
                'email' => $request->get('contact_email'),
                'phone' => $request->get('contact_phone'),
                'user_message' => $request->get('contact_message')
            ), function($message) use($email)
            {
                $message->from($email);
                $message->to(env('OFFICIAL_MAIL'), 'SWAN')->subject(__('front.contactsubject'));
            });

            //Session::flash('flash_message', __('front.thankscontact'));

            alert()->success(__('front.thankscontact'), __('front.messagesent'));


            return redirect()->back();
    }

    public function subscribe(Request $request) {

        $this->validate($request, [
                'subscriberemail' => 'required|email|unique:subscribers,subscriber',
            ]);

        $subscribe = new Subscriber();
        $subscribe->subscriber = $request->subscriberemail;
        $subscribe->save();

        alert()->success(__('front.messagesubscriber'), __('front.thankssubscriber'));


        return redirect()->back();
    }
}
