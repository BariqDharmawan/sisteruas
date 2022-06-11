<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CustomerMessage;
use Illuminate\Http\Request;

class MessageCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(CustomerMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $email = $request->email;
        $name = $request->name;
        return $this->from($email, $email)->replyTo($email)->view('send_mail')->with([
          'nameSender' => $this->message->name,
          'countrySender' => $this->message->country,
          'emailSender' => $this->message->email,
          'companySender' => $this->message->company_name,
          'bodySender' => $this->message->message
        ]);
    }
}
