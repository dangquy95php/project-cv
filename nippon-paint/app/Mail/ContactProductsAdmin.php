<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactProductsAdmin extends Mailable
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
            ->to(config('mail.from.contact.admin_to_address'))
            ->subject('This is a test mail')
            ->view('emails.contact_products_admin')
            ->with([
                'contacts' => $this->contacts,
            ]);
    }
}
