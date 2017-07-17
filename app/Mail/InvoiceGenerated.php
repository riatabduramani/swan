<?php

namespace App\Mail;

use App\Models\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceGenerated extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->invoice->invoice_type == 1) {
        return $this->view('emails.invoice.generate')
                    ->subject("New invoice #".$this->invoice->id."")
                    ->with([
                        'invoice' => $this->invoice,
                        'nr' => $this->invoice->id,
                        'date' => $this->invoice->invoice_date,
                        'due' => $this->invoice->due_date,
                        'type' => $this->invoice->invoice_type,
                        'title' => $this->invoice->packetservice->name,
                        'description' => $this->invoice->description,
                        'notes' => $this->invoice->notes,
                        'total_sum' => $this->invoice->total_sum,
                        'status' => $this->invoice->payment_status,
                        'name' => $this->invoice->customer->user->name,
                        'surname' => $this->invoice->customer->user->surname,
                        'address' => $this->invoice->customer->address_out,
                        'postal' => $this->invoice->customer->postal_out,
                        'city' => $this->invoice->customer->city,
                        'country' => $this->invoice->customer->countryout->code,
                        'email' => $this->invoice->customer->user->email,
                    ]);
        }
        else {
            return $this->view('emails.invoice.generate')
                    ->subject("New invoice #".$this->invoice->id."")
                    ->with([
                        'invoice' => $this->invoice,
                        'nr' => $this->invoice->id,
                        'date' => $this->invoice->invoice_date,
                        'due' => $this->invoice->due_date,
                        'type' => $this->invoice->invoice_type,
                        'title' => $this->invoice->customservice->name,
                        'description' => $this->invoice->description,
                        'notes' => $this->invoice->notes,
                        'total_sum' => $this->invoice->total_sum,
                        'status' => $this->invoice->payment_status,
                        'name' => $this->invoice->customer->user->name,
                        'surname' => $this->invoice->customer->user->surname,
                        'address' => $this->invoice->customer->address_out,
                        'postal' => $this->invoice->customer->postal_out,
                        'city' => $this->invoice->customer->city,
                        'country' => $this->invoice->customer->countryout->code,
                        'email' => $this->invoice->customer->user->email,
                    ]);
        }
        //return $this->view('view.name');
    }
}
