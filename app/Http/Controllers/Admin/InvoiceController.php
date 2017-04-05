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
    	$datenow = Carbon::now();
        
        return view('admin.invoices.show',compact('invoice','datenow'));
    }
    

    public function updatecustompaymentinvoice(Request $request) {
    	$this->validate($request, [
            'invoice_status' => 'required',
        ]);

    	$invoiceid = $request->invoice_id;
    	$updatedby = Auth::user()->id;

    	$update = Invoice::find($invoiceid);
    	
	    $update->payment_status = $request->invoice_status;
    	$update->payment_method = $request->payment_method;
    	$update->updated_by = $updatedby;
    	$update->paid_at = Carbon::now();
    	$update->update();
    	

    	return redirect("/admin/invoice/custominvoice/$invoiceid");
    }

    public function create() {
    	
		return view('admin.invoices.create');
    }

    public function createpacketinvoice() {

        //$packets = Packet::listsTranslations('name')->pluck('name', 'id', 'price');
    	
		return view('admin.invoices.create-packet');
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
		$customservice->created_by = $userid;
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
			$duedate = Carbon::now();
			$invoice->due_date = $duedate->addDays(8);
		}
		
		//only if this is packet service
		if($invoicetype == 1) {
			$packetdate = Carbon::now();
			$invoice->end_date = $packetdate->addYear(1);

            $subscription = new Subscription();	
            $subscription->customer_id = $customerid;
            $subscription->packet_id = $request->packets;
            $subscription->start = $packetdate;
            $subscription->end = $packetdate->addYear(1);
            $subscription->save();
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

        return view('admin.invoices.create', compact('customerid','user','duedate','packets'));   
       
    }

    public function product_prices(){
        $id = Input::get('packet_id');
        $price = Packet::with('service')->where('id', $id)->get();
        
        return $price;
    }

	public function destroy($id) {

        //$invoice = Invoice::find($id);
        //$userid = $invoice->user->id;

        Invoice::destroy($id);

        Session::flash('flash_message', 'Customer deleted successfully!');
        
        //return redirect("/admin/customer/$userid");
    }
}
