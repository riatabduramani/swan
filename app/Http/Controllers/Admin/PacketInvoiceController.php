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

class PacketInvoiceController extends Controller
{
    public function create() {

    	return view('admin.invoices.create-packet');
    }

    public function store(Request $request) {

    	return $request->all();
    }

     public function show($id) {
    	
    	//$invoice = Invoice::find($id);
        return $id;
        //return view('admin.invoices.show');
    }

    public function displayFormPacket(Request $request)
    {
        //$invoicenr = Invoice::pluck('id')->last();
        
        $customerid = $request->customer_id;
        $user = User::find($customerid);
        $duedate = Carbon::now();
        $duedate->addDays(8);

        $packets = Packet::listsTranslations('name')->pluck('name', 'id');

        return view('admin.invoices.create-packet', compact('customerid','user','duedate','packets','packetprice'));
    }

    public function product_prices(){
        $id = Input::get('packet_id');
        $price = Packet::with('service')->where('id', $id)->get();
        
        return $price;
    }
}
