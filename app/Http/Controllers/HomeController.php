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
use File;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;

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

    public function footer() {
        $packets = Packet::translated()->get();
        //$settings = Settings::translated()->first();
        return view('frontend.footer', compact('packets'));
    }
}
