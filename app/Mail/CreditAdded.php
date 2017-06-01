<?php

namespace App\Mail;

use App\Models\Credits;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreditAdded extends Mailable
{
    use Queueable, SerializesModels;

    protected $credit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Credits $credit)
    {
        $this->credit = $credit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credit.add')
                    ->subject("Credit added to your account")
                    ->with([
                        'notes' => $this->credit->notes,
                        'amount' => $this->credit->amount,
                        'date' => $this->credit->created_at,
                   
                        'name' => $this->credit->customer->user->name,
                        'surname' => $this->credit->customer->user->surname,
                        'address' => $this->credit->customer->address_out,
                        'postal' => $this->credit->customer->postal_out,
                        'city' => $this->credit->customer->city,
                        'country' => $this->credit->customer->countryout->code,
                        'email' => $this->credit->customer->user->email,
                    ]);
        //return $this->view('view.name');
    }
}
