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

class InvoicesController extends Controller
{
    public function index() {
    	$invoice = Invoice::where('customer_id', Auth::user()->customer->id)->where('payment_status', 1)->orderBy('invoice_date', 'DESC')->get();
    	$unpaidinvoice = Invoice::where('customer_id', Auth::user()->customer->id)->where('payment_status', 2)->orderBy('invoice_date', 'DESC')->get();

    	return view('frontend.panel.invoices', compact('invoice','unpaidinvoice'));
    }

    public function show($id) {
    	$invoice = Invoice::findOrFail($id);
    	return view('frontend.panel.showinvoice', compact('invoice'));
    }
}
