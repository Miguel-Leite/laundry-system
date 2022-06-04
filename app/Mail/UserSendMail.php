<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserSendMail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     *  variables: $user, $view 
     *
     * @var [private]
     */
    private $user,$options;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, array $options)
    {
        $this->user = $user;
        $this->options = $options;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_USERNAME'),'ATIWA FINANÇAS')
                    ->subject($this->options['subject'])
                    ->markdown($this->options['view'])
                    ->with([
                        'user' => $this->user,
                        'options' => $this->options
                    ]);
    }
}
