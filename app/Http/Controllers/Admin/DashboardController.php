<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\City;
use App\Models\Comment;
use App\Models\Potential;
use App\Models\District;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Subscription;
use App\Models\Todolist;
use App\Models\Document;
use File;
use App\User;
use Session;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index() {
    	$customers = Customer::count();

    	if(Auth::user()->hasRole(['superadmin','admin'])) {
    		$tasks = Todolist::whereNull('datedone')->orderBy('duedate','asc')->take(5)->get();
    	} else {
    		
    		$tasks = Todolist::whereNull('datedone')->where('assigned_to', Auth::user()->id)->orderBy('duedate','asc')->take(5)->get();
    	}

    	$invoices = Invoice::with('customer')->where('payment_status', 2)->get();

        $comments = Comment::where('commented_by', Auth::user()->id)->take(5)->get();

        $customerexpirepacket = Subscription::with('customer')
                                                ->whereBetween('end', array(Carbon::now(), Carbon::now()->subDays(50)))
                                                ->get();


    	return view('admin.dashboard', compact('customers','tasks','invoices','comments','customerexpirepacket'));
    }
}
