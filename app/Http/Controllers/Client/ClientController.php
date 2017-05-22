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

class ClientController extends Controller
{

    public function index() {

        //$customer = User::find(Auth::user()->customer->id)->get();

        $id = Auth::user()->customer->id;

        $chosenpacket = Subscription::with('customer')
                                    ->where('customer_id', $id)
                                    ->where('end','>=', Carbon::now())
                                    ->get()->first();

        $credit = Credits::with('customer')->where('customer_id', $id)->sum('balance');

        return view('frontend.panel.index', compact('chosenpacket','credit'));
    }

}
