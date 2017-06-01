<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerServices;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Packet;
use App\Models\Credits;
use App\Models\Subscription;
use App\User;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use Auth;

use App\Order;
use App\Mail\InvoiceGenerated;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{

    public function show($id) {
    	
    	//$invoice = Invoice::find($id);
        
        //return view('admin.invoices.show',compact('invoice'));
    }

    public function showcustominvoice($id) {
    	
    	$invoice = Invoice::with('customservice')->find($id);
        $customerid = $invoice->customer->id;
    	$datenow = Carbon::now();
        $chosenpacket = Subscription::with('customer')->where('customer_id', $customerid)->get()->last();
        $credits = Credits::with('customer')->where('customer_id',$customerid)
                                    ->where('balance','!=', 0)
                                    ->where('balance','>',0)
                                    ->pluck('balance','id');
        
        return view('admin.invoices.show',compact('invoice','datenow','chosenpacket','credits'));
    }

    public function showpacketinvoice($id) {
        
        $invoice = Invoice::with('packetservice')->find($id);
        $datenow = Carbon::now();
        $customerid = $invoice->customer->id;
        $chosenpacket = Subscription::with('customer')
                                    ->where('customer_id', $customerid)
                                    ->where('end','>=', Carbon::now())
                                    ->get()->first();

        $chosenpacketnext = Subscription::with('customer')->where('customer_id', $customerid)->get()->last();
        $credits = Credits::with('customer')->where('customer_id',$customerid)
                                    ->where('balance','!=', 0)
                                    ->where('balance','>',0)
                                    ->pluck('balance','id');
        
        return view('admin.invoices.showpacketinvoice',compact('invoice','datenow','chosenpacket','chosenpacketnext','credits'));
    }
    

    public function updatecustompaymentinvoice(Request $request) {
    	$this->validate($request, [
            'invoice_status' => 'required',
        ]);

    	$invoiceid = $request->invoice_id;
    	$updatedby = Auth::user()->id;

    	$update = Invoice::find($invoiceid);
    	
	    $update->payment_status = $request->invoice_status;
    	

        if($request->notes) {
            $update->description = $request->notes;
        }

        if($request->invoice_status == 3) {
            $update->payment_method = NULL;
            $update->declined_at = Carbon::now();
        } else {
            $update->payment_method = $request->payment_method;
        }
        
        if(!empty($request->apply_credit)) {
            $credit = Credits::find($request->apply_credit);
            $credit->balance = $credit->balance - $request->service_price;
            $credit->save();
        } 

    	$update->updated_by = $updatedby;
    	$update->paid_at = Carbon::now();
    	$update->update();

    	return redirect("/admin/invoice/custominvoice/$invoiceid");
    }

    public function updatepacketpaymentinvoice(Request $request) {
        $this->validate($request, [
            'invoice_status' => 'required',
        ]);

        $invoiceid = $request->invoice_id;
        $updatedby = Auth::user()->id;

        $update = Invoice::find($invoiceid);
        
        $update->payment_status = $request->invoice_status;
        //$update->payment_method = $request->payment_method;

        if($request->notes) {
            $update->description = $request->notes;
        }

         if($request->invoice_status == 3) {
            $update->payment_method = NULL;
        } else {
            $update->payment_method = $request->payment_method;
        }

        if(!empty($request->apply_credit)) {
            $credit = Credits::find($request->apply_credit);
            $credit->balance = $credit->balance - $request->total_sum;
            $credit->save();
        } 

        $update->updated_by = $updatedby;
        $update->paid_at = Carbon::now();
        $update->update();

        return redirect("/admin/invoice/packetinvoice/$invoiceid");
    }

    public function create() {
    	
		return view('admin.invoices.create');
    }

    public function store(Request $request)
    {
   		
   		$this->validate($request, [
            'service_title' => 'required',
            'service_description' => 'required',
            'service_price' => 'required',
            'invoice_status' => 'required',
        ]);

   		$userid = Auth::user()->id;
    	$invoicetype = $request->invoice_type;
        $customerid = $request->customer_id;
    		
        $customservice = new CustomerServices();
        $customservice->name = $request->service_title;
        $customservice->description = $request->service_description;
        $customservice->created_by = Auth::user()->name.' '.Auth::user()->surname;
        $customservice->save();
        $customid = $customservice->id;
    
  
        $invoice = new Invoice();
        
		$invoice->invoice_type = $invoicetype;
		$invoice->invoice_date = Carbon::now();
		
		//this should be inserted into custom_service and get that id
		//if is customer service insert customservice ID, if is packet then insert that packet id
		$invoice->service_id = $customid;

		//if the status is not Paid then show duedate
		$invoice->payment_status = $request->invoice_status;
		$paystatus = $request->invoice_status;

		if($paystatus != 1) {
            if(!empty($request->duedate)) {
                $invoice->due_date = $request->duedate;
            }
		}
		
		$invoice->description = $request->service_note;
		$invoice->customer_id = $request->customer_id;

        if(!empty($request->apply_credit)) {
            $credit = Credits::find($request->apply_credit);
            $credit->balance = $credit->balance - $request->service_price;
            $credit->save();
            $invoice->total_sum = $request->service_price;
        } 
        else {
            $invoice->total_sum = $request->service_price;
        }
		
		
		//if status is Paid then it should insert this date
		if($paystatus == 1) {
			$invoice->paid_at =  Carbon::now();
			$invoice->payment_method = $request->payment_method;
		}

		//the user who has created this custom service
		$invoice->created_by = $userid;

		$invoice->save();

		//dd($invoice);
        if($invoice->save() === TRUE) {
            Mail::to(Auth::user()->email)->send(new InvoiceGenerated($invoice));
        }

        Session::flash('flash_message', 'Invoice created successfully!');

        return redirect("admin/customer/$customerid");
    	
    }

    public function displayForm(Request $request)
	{
		//$invoicenr = Invoice::pluck('id')->last();

		$customerid = $request->customer_id;
        $invoicetype = $request->invoice_type;
	    //$user = User::find($customerid);
        $customer = Customer::find($customerid);
	    $duedate = Carbon::now();
	    $duedate->addDays(8);

        $packets = Packet::listsTranslations('name')->pluck('name', 'id');

        $credits = Credits::with('customer')->where('customer_id',$customerid)
                                    ->where('balance','!=', 0)
                                    ->where('balance','>',0)
                                    ->pluck('balance','id');

	    return view('admin.invoices.create', compact('customerid','customer','duedate','invoicetype','packets','credits'));	
	   
	}

    public function displayFormPacket(Request $request)
    {
        //$invoicenr = Invoice::pluck('id')->last();
        
        $customerid = $request->customer_id;
        $customer = Customer::find($customerid);
        $duedate = Carbon::now();
        $duedate->addDays(8);

        $packets = Packet::listsTranslations('name')->pluck('name', 'id');

        $credits = Credits::with('customer')->where('customer_id',$customerid)
                                            ->where('balance','!=', 0)
                                            ->where('balance','>', 0)
                                            ->pluck('balance','id');

        return view('admin.invoices.create-packet', compact('customerid','customer','duedate','packets','credits'));   
       
    }

    public function product_prices(){
        $id = Input::get('packet_id');
        $price = Packet::with('service')->where('id', $id)->get();
        
        return $price;
    }

	public function destroy(Request $request, $id) {

        Invoice::destroy($id);

        Session::flash('flash_message', 'Invoice deleted successfully!');
        return redirect("/admin/customer/$request->customer_id");
    }

    public function storePacketInvoice(Request $request)
    {


        $userid = Auth::user()->id;
        $invoicetype = $request->invoice_type;
        $customerid = $request->customer_id;
        
        $invoice = new Invoice();
        $invoice->invoice_type = $invoicetype;
        $invoice->invoice_date = Carbon::now();
        
        //this should be inserted into custom_service and get that id
        //if is customer service insert customservice ID, if is packet then insert that packet id
        $customid = $request->packets;
        $invoice->service_id = $customid;

        //if the status is not Paid then show duedate
        $invoice->payment_status = $request->invoice_status;
        $paystatus = $request->invoice_status;

        if($paystatus != 1) {
            if(!empty($request->duedate)) {
                $invoice->due_date = $request->duedate;
            }
        }
        
       
        $packetdate = Carbon::now();
        $invoice->end_date = $packetdate->addYear(1);

        $invoice->description = $request->service_note;
        $invoice->customer_id = $request->customer_id;
        
        if(!empty($request->apply_credit)) {
            $credit = Credits::find($request->apply_credit);
            $credit->balance = $credit->balance - $request->total_sum;
            $credit->save();
            $invoice->total_sum = $request->total_sum;
        } 
        else {
            $invoice->total_sum = $request->total_sum;
        }
        
        
        //if status is Paid then it should insert this date
        if($paystatus == 1) {
            $invoice->paid_at =  Carbon::now();
            $invoice->payment_method = $request->payment_method;
        }

        if($paystatus == 3) {
            $invoice->payment_method = NULL;
        }
        //the user who has created this custom service
        $invoice->created_by = $userid;

        $invoice->save();

        $chosenpacket = Subscription::with('customer')->where('customer_id', $customerid)->get()->last();

        if(count($chosenpacket) > 0) {
            $subscription = new Subscription();
            $subscription->invoice_id = $invoice->id;
            $subscription->customer_id = $customerid;
            $subscription->packet_id = $request->packets;
            $subscription->start = Carbon::parse($chosenpacket->end);
            $subscription->end = Carbon::parse($chosenpacket->end)->addYear(1);
            $subscription->save();
        } else {
            $subscription = new Subscription();
            $subscription->invoice_id = $invoice->id;
            $subscription->customer_id = $customerid;
            $subscription->packet_id = $request->packets;
            $subscription->start = Carbon::now();
            $subscription->end = Carbon::now()->addYear(1);
            $subscription->save();
        }

        Session::flash('flash_message', 'Invoice created successfully!');

        return redirect("admin/customer/$customerid");

    }

}
