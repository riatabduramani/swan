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

use App\Models\Todolist;
use Illuminate\Support\Facades\Storage;

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
        $unpaidinvoice = Invoice::where('customer_id', Auth::user()->customer->id)->where('payment_status', 2)->orderBy('invoice_date', 'DESC')->get();
        
        
        
        /*Added*/		
    		/*$tasks = Todolist::whereNull('datedone')->where('customer_id', $id)->orderBy('duedate','asc')->get();*/
    		
    		$tasksdone = Todolist::whereNotNull('datedone')->where('customer_id', $id)->orderBy('duedate','asc')->paginate(15);

        $users = User::whereHas('roles', function($q)
                        {
                            $q->where('name', 'employee')->orWhere('name', 'admin');
                        })->pluck('name','id');
        /*End Added*/
        
        

        return view('frontend.panel.index', compact('chosenpacket','credit','unpaidinvoice','tasksdone'));
    }

    public function documents() {
        $id = Auth::user()->customer->id;
        $customer = Customer::findOrFail($id);

        return view('frontend.panel.documents', compact('customer'));
    }
    
    
    public function downloadFile($file)
    {
        $myFile = public_path("uploads/documents/".$file);
        $headers = ['Content-Type: image/jpg'];
        $newName = time().$file;


        return response()->download($myFile, $newName, $headers);
    }
 
}
