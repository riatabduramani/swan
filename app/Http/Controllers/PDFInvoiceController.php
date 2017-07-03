<?php

namespace App\Http\Controllers;
use PDF;
use Auth;
use Carbon;
use App\Models\Invoice;
use App\Models\Subscriber;
use Excel;

use Illuminate\Http\Request;

class PDFInvoiceController extends Controller
{
    public function pdf($id) {
    	try {
			
			$invoiceData = Invoice::find($id);
			$invoiceInfo = [
						'invoice' => $invoiceData,
                        'nr' => $invoiceData->id,
                        'date' => $invoiceData->invoice_date,
                        'due' => $invoiceData->due_date,
                        'type' => $invoiceData->invoice_type,
                        'title' => $invoiceData->customservice->name,
                        'packetname' => $invoiceData->packetservice->name,
                        'description' => $invoiceData->description,
                        'notes' => $invoiceData->notes,
                        'total_sum' => $invoiceData->total_sum,
                        'status' => $invoiceData->payment_status,
                        'name' => $invoiceData->customer->user->name,
                        'surname' => $invoiceData->customer->user->surname,
                        'address' => $invoiceData->customer->address_out,
                        'postal' => $invoiceData->customer->postal_out,
                        'city' => $invoiceData->customer->city,
                        'country' => $invoiceData->customer->countryout->code,
                        'email' => $invoiceData->customer->user->email,

			];

			$invoice = PDF::loadView('pdfinvoice', $invoiceInfo)->setPaper('a4');

			return $invoice->download("Invoice-SWAN-".$invoiceData->id.".pdf");
			//return $invoice->stream();

	   	} catch (Exception $e) {
	   		abort(500);	
	   	}
    }

    public function export() {

        $subscriber = Subscriber::pluck('subscriber');

            Excel::create('Subscribers-SWAN-'.date('d-m-Y'), function($excel) use($subscriber) {

                $excel->sheet('SWAN Subscribers', function($sheet) use($subscriber) {

                    $sheet->fromArray($subscriber);

                });

            })->export('csv');
    }

}
