<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactProductsUser extends Mailable
{
    use Queueable, SerializesModels;

    private $contacts;

    /**
     * Create a new message instance.
     *
     * @param $contacts
     */
    public function __construct($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from(config('mail.from.contact.from_address'))
            ->to($this->contacts->email)
            ->subject('This is a test mail')
            ->view('emails.contact_products_user')
            ->with([
                'contacts' => $this->contacts,
            ]);
    }
}
