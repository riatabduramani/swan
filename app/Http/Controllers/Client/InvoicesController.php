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
    	$invoice = Invoice::where('customer_id', Auth::user()->customer->id)->orderBy('invoice_date', 'DESC')->get();
    	
    	return view('frontend.panel.invoices', compact('invoice'));
    }

    public function show($id) {
    	$invoice = Invoice::findOrFail($id);
    	$invoicmax = Invoice::max('id')+1;

    	$gateway =  array(
                            'clientId'          =>  env('HALK_CLIENTID'), 
                            'amount'            =>  number_format($invoice->packetservice->new_price * $invoice->packetservice->months, 2, '.', ','),
                            'amount-mk'         =>  round(($invoice->packetservice->new_price * $invoice->packetservice->months) * env('CURRENCY')),
                            'oid'               =>  "oid-P-$invoicmax-".rand(100,1000),
                            'okUrl'             =>  env('APP_URL').'/en/paymentstatus',
                            'failUrl'           =>  env('APP_URL').'/en/paymentstatus',
                            'rnd'               =>  microtime(),
                            'currencyVal'       =>  env('HALK_CURRENCYVAL'),
                            'storekey'          =>  env('HALK_STOREKEY'),
                            'storetype'         =>  env('HALK_STORETYPE'),
                            'lang'              =>  env('HALK_LANG'),
                            'instalment'        =>  "",
                            'transactionType'   =>  env('HALK_TRANSACTIONTYPE'),
                        );

        $hashstr = $gateway['clientId'] . $gateway['oid'] . $gateway['amount-mk'] . $gateway['okUrl'] . $gateway['failUrl'] .$gateway['transactionType'] .$gateway['rnd'] . $gateway['storekey'];

        $hash = base64_encode(pack('H*',sha1($hashstr)));

    	return view('frontend.panel.showinvoice', compact('invoice','gateway','hash'));
    }
     public function paymentstatus(Request $request) {

         $mdStatus= $request->mdStatus;
    
            if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
            {              
               $Response = $request->Response;

               switch ($Response) {
                    case 'Approved':
                    	
                    	Invoice::where('order_id', $oid)->update(['payment_status' => 1, 'payment_method' => 2]);

                        return view('frontend.panel.showinvoice');
                        break;
                    case 'Error",':
                        return "<font color=\"red\">Your payment is not approved.</font>";
                        break;
                   case 'Declined",':
                        return "<font color=\"red\">Your payment has been declined.</font>";
                        break;
                   default:
                        return "<font color=\"red\">Your payment has been declined.</font>";
                        break;
                }
               
            }   
            else
            {
                return "<font color=\"red\">3D Authentication is not successful.</font>";
            }   

    }

}
