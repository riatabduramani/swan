<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
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

use App\Mail\InvoiceGenerated;
use App\Mail\InvoicePaid;
use App\Mail\InvoiceDeclined;
use Illuminate\Support\Facades\Mail;

class InvoicesController extends Controller
{
    public function index() {
        $invoice = Invoice::where('customer_id', Auth::user()->customer->id)->orderBy('invoice_date', 'DESC')->get();
        
        return view('frontend.panel.invoices', compact('invoice'));
    }

    public function show($id) {

        $invoice = Invoice::findOrFail($id);
        $gateway =  array(
                            'clientId'          =>  '180000188', 
                            'amount'            =>  number_format($invoice->total_sum, 2, '.', ','),
                            'amount-mk'         =>  floor($invoice->total_sum_mkd),
                            'oid'               =>  "oid-PCL-$invoice->id",
                            'okUrl'             =>  'http://swan.mk/en/payment-status',
                            'failUrl'           =>  'http://swan.mk/en/payment-status',
                            'rnd'               =>  microtime(),
                            'currencyVal'       =>  '807',
                            'storekey'          =>  'SKEY0188',
                            'storetype'         =>  '3D_PAY_HOSTING',
                            'lang'              =>  'en',
                            'instalment'        =>  '2',
                            'transactionType'   =>  'Auth',
                        );

        /*$hashstr = $gateway['clientId'] . $gateway['oid'] . $gateway['amount-mk'] . $gateway['okUrl'] . $gateway['failUrl'] .$gateway['transactionType'] .$gateway['rnd'] . $gateway['storekey'];*/
        /*$hash = base64_encode(pack('H*',sha1($hashstr)));*/
        $hashstr = $hashstr = $gateway['clientId'] . $gateway['oid'] . $gateway['amount-mk'] . $gateway['okUrl'] . $gateway['failUrl'] .$gateway['transactionType'] .$gateway['instalment'] .$gateway['rnd'] . $gateway['storekey'];
       /* dd($hashstr);*/

        $hash = base64_encode(pack('H*',sha1($hashstr)));

        return view('frontend.panel.showinvoice', compact('invoice','gateway','hash'));
    }
     

    public function paymentstatus(Request $request) {

         $mdStatus= $request->mdStatus;
         $Response = $request->Response;
         /*dd($mdStatus);*/
            if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
            {              
               $Response = $request->Response;

               switch ($Response) {
                    case 'Approved':
                        $invoice = Invoice::find(substr($request->ReturnOid,8));
                        $invoice->where('id', $invoice->id)
                                ->update(['order_id' => $request->ReturnOid,'payment_status' => 1, 'paid_at'=>Carbon::now()]);
                        Mail::to(Auth::user()->email)->send(new InvoiceGenerated($invoice));
                        Session::flash('message-approved', __('front.approved'));
                        return redirect('/'.App::getLocale()."/panel/invoices/$invoice->id");
                        break;
                    case 'Error':
                        $invoice = Invoice::find(substr($request->ReturnOid,8));
                        $invoice->where('id', $invoice->id)
                                ->update(['order_id' => $request->ReturnOid,'payment_status' => 2, 'due_date'=>Carbon::now()->addDays(8)]);

                        Mail::to(Auth::user()->email)->send(new InvoiceGenerated($invoice));
                        
                        Session::flash('message-notapproved', __('front.notapproved'));
                        return redirect('/'.App::getLocale()."/panel/invoices/$invoice->id");
                        break;
                   case 'Declined':                     
                        $invoice = Invoice::find(substr($request->ReturnOid,8));
                        $invoice->where('id', $invoice->id)
                                ->update(['order_id' => $request->ReturnOid,'payment_status' => 3]);
                                
                        Session::flash('message-declined', __('front.declined'));
                        return redirect('/'.App::getLocale()."/panel/invoices");
                        break;
                   default:
                        $invoice = Invoice::find(substr($request->ReturnOid,8));
                        $invoice->where('id', $invoice->id)
                                ->update(['order_id' => $request->ReturnOid,'payment_status' => 3]);
                        Session::flash('message-declined', __('front.declined'));
                        return redirect('/'.App::getLocale()."/panel/invoices");
                        break;
                }
               
            }   
            else
            {
                Session::flash('message-declined', __('front.3dauth'));
                return redirect()->back();
            }  



    }

}
