<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerServices;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Packet;
use App\Models\Subscription;
use App\User;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Session;
use Auth;


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
        
        return view('admin.invoices.show',compact('invoice','datenow','chosenpacket'));
    }

    public function showpacketinvoice($id) {
        
        $invoice = Invoice::with('packetservice')->find($id);
        $datenow = Carbon::now();
        $customerid = $invoice->customer->id;
        $chosenpacket = Subscription::with('customer')->where('customer_id', $customerid)->get()->last();
        
        return view('admin.invoices.showpacketinvoice',compact('invoice','datenow','chosenpacket'));
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
        } else {
            $update->payment_method = $request->payment_method;
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
            'service_title' => 'required|min:3',
            'service_description' => 'required|min:3',
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
		
		$invoice->total_sum = $request->service_price;
		
		//if status is Paid then it should insert this date
		if($paystatus == 1) {
			$invoice->paid_at =  Carbon::now();
			$invoice->payment_method = $request->payment_method;
		}

		//the user who has created this custom service
		$invoice->created_by = $userid;

		$invoice->save();

		//dd($invoice);

        Session::flash('flash_message', 'Invoice created successfully!');

        return redirect("admin/customer/$customerid");
    	
    }

    public function displayForm(Request $request)
	{
		//$invoicenr = Invoice::pluck('id')->last();
	    
		$customerid = $request->customer_id;
        $invoicetype = $request->invoice_type;
	    $user = User::find($customerid);
	    $duedate = Carbon::now();
	    $duedate->addDays(8);

        $packets = Packet::listsTranslations('name')->pluck('name', 'id');

	    return view('admin.invoices.create', compact('customerid','user','duedate','invoicetype','packets'));	
	   
	}

    public function displayFormPacket(Request $request)
    {
        //$invoicenr = Invoice::pluck('id')->last();
        
        $customerid = $request->customer_id;
        $user = User::find($customerid);
        $duedate = Carbon::now();
        $duedate->addDays(8);

        $packets = Packet::listsTranslations('name')->pluck('name', 'id');

        return view('admin.invoices.create-packet', compact('customerid','user','duedate','packets'));   
       
    }

    public function product_prices(){
        $id = Input::get('packet_id');
        $price = Packet::with('service')->where('id', $id)->get();
        
        return $price;
    }

	public function destroy($id) {

        Invoice::destroy($id);

        Session::flash('flash_message', 'Invoice deleted successfully!');
        //return redirect("/admin/customer/$customerid");
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
        
        $invoice->total_sum = $request->total_sum;
        
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

        $subscription = new Subscription();
        $subscription->invoice_id = $invoice->id;
        $subscription->customer_id = $customerid;
        $subscription->packet_id = $request->packets;
        $subscription->start = Carbon::now();
        $subscription->end = Carbon::now()->addYear(1);
        $subscription->save();

        //dd($invoice);

        Session::flash('flash_message', 'Invoice created successfully!');

        return redirect("admin/customer/$customerid");

    }

}
