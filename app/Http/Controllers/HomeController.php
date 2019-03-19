<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App;
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

//use App\Order;
use App\Mail\InvoiceGenerated;
use App\Mail\InvoicePaid;
use App\Mail\InvoiceDeclined;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

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
        /*App::setLocale('sq');*/ 
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

    public function tocheckout($id, Request $request) {


        if(Auth::check() && Auth::user()->hasRole('client')) {
            

        $invoicemax = Invoice::max('id')+1;

        $services = Packet::findOrFail($id);
        
        foreach ($services->service as $servicedesc) {
            $locale = App::getLocale();
            $description[] = $servicedesc->{"name:$locale"};
        }

        $showdescription = implode('<br>', $description);

        $userid = Auth::user()->id;
        $customerid = Auth::user()->customer->id;//$customerid = $request->customer_id;
        $customeruserid = Auth::user()->customer->id; //$request->customer_user_id;
        $customeremail = Auth::user()->email; //$request->customer_email;
        
        $invoice = new Invoice();
        $invoice->invoice_type = 1;
        $invoice->invoice_date = Carbon::now();
        
        //this should be inserted into custom_service and get that id
        //if is customer service insert customservice ID, if is packet then insert that packet id
        
        $invoice->service_id = $id;

        //if the status is not Paid then show duedate
        $invoice->payment_status = 2;
        
        $invoice->due_date = Carbon::now()->addDays(8);
                        
       
        $packetdate = Carbon::now();
        //$invoice->end_date = $packetdate->addYear(1);
        $invoice->end_date = $packetdate->addMonths($services->months);

        //$invoice->notes = $request->service_note;
        $invoice->description = nl2br($showdescription);
        $invoice->customer_id = $customeruserid;
        $invoice->months = $services->months;
        $invoice->price = $services->new_price;
        $invoice->price_mkd = round($services->new_price * env('CURRENCY'));
        
        $invoice->total_sum = $services->new_price * $services->months;
        $invoice->total_sum_mkd = round(($services->new_price * $services->months) * env('CURRENCY'));

        //the user who has created this custom service
        $invoice->created_by = $userid;

        $invoice->order_id = "oid-PCL-$invoicemax";

        $invoice->save();

        $chosenpacket = Subscription::with('customer')->where('customer_id', $customerid)->get()->last();

        if(count($chosenpacket) > 0) {
            $subscription = new Subscription();
            $subscription->invoice_id = $invoice->id;
            $subscription->customer_id = $customerid;
            $subscription->packet_id = $id;
            $subscription->start = Carbon::parse($chosenpacket->end);
            $subscription->end = Carbon::parse($chosenpacket->end)->addMonths($services->months);
            $subscription->save();
        } else {
            $subscription = new Subscription();
            $subscription->invoice_id = $invoice->id;
            $subscription->customer_id = $customerid;
            $subscription->packet_id = $id;
            $subscription->start = Carbon::now();
            $subscription->end = Carbon::now()->addMonths($services->months);
            $subscription->save();
        }

        if($invoice->save() === TRUE) {
            //Mail::to($customeremail)->send(new InvoiceGenerated($invoice));
        

        Session::flash('flash_message', 'Invoice created successfully.');

        $gateway =  array(
                            'clientId'          =>  '180000188', 
                            'amount'            =>  $invoice->total_sum,
                            'amount-mk'         =>  $invoice->total_sum_mkd,
                            'oid'               =>  "oid-PCL-$invoice->id",
                            'okUrl'             =>  'http://swan.mk/'.App::getLocale().'/payment-status',
                            'failUrl'           =>  'http://swan.mk/'.App::getLocale().'/payment-status',
                            'rnd'               =>  microtime(),
                            'currencyVal'       =>  '807',
                            'storekey'          =>  'SKEY0188',
                            'storetype'         =>  '3D_PAY_HOSTING',
                            'lang'              =>  'en',
                            'instalment'        =>  "",
                            'transactionType'   =>  'Auth',
                        );

        $hashstr = $gateway['clientId'] . $gateway['oid'] . $gateway['amount-mk'] . $gateway['okUrl'] . $gateway['failUrl'] .$gateway['transactionType'] .$gateway['rnd'] . $gateway['storekey'];

        $hash = base64_encode(pack('H*',sha1($hashstr)));

         }

          return view('frontend.pages.checkout', compact('services', 'gateway', 'hash', 'invoice'));
         } else {

            return view('auth.login');
         }
       
    }

        public function method(Request $request) {

            return Redirect::away("https://epay.halkbank.mk/fim/est3Dgate")->withInput(Input::all());
            /*redirect()->away("https://epay.halkbank.mk/fim/est3Dgate")->withInput(Input::all());*/
        }

         public function paymentstatus(Request $request) {

         $mdStatus= $request->mdStatus;
    
            if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
            {              
               $Response = $request->Response;

               switch ($Response) {
                    case 'Approved':
                        $invoice = Invoice::where('order_id', '=', $request->ReturnOid)->first();
                        $invoice->payment_status = 1;
                        $invoice->paid_at =  Carbon::now();

                        $invoice->save();

                        Mail::to(Auth::user()->email)->send(new InvoiceGenerated($invoice));

                        Session::flash('message-approved', __('front.approved'));
                        //return '/'.App::getLocale().'/panel/invoices/'.$invoice->id;
                        //return redirect('/'.App::getLocale()."/panel/invoices");
                        return redirect('/'.App::getLocale()."/panel/invoices/$invoice->id");
                        break;
                    case 'Error':
                        $invoice = Invoice::where('order_id', '=', $request->ReturnOid)->first();
                        $invoice->payment_status = 2;
                        $invoice->due_date = Carbon::now()->addDays(8);
                        $invoice->save();

                        Mail::to(Auth::user()->email)->send(new InvoiceGenerated($invoice));
                        
                        Session::flash('message-notapproved', __('front.notapproved'));
                        return redirect('/'.App::getLocale()."/panel/invoices/$invoice->id");
                        break;
                   case 'Declined':
                        $invoice = Invoice::where('order_id', '=', $request->ReturnOid)->first();
                        $invoice->payment_status = 3;
                        $invoice->save();
                        Session::flash('message-declined', __('front.declined'));
                        return redirect('/'.App::getLocale()."/panel/invoices");
                        break;
                   default:
                        $invoice = Invoice::where('order_id', '=', $request->ReturnOid)->first();
                        $invoice->payment_status = 3;
                        $invoice->save();
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
