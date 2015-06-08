<?php

namespace DraperStudio\TurnKey;

use DraperStudio\TurnKey\Contracts\FeedbackMailer as MailerContract;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

class FeedbackMailer implements MailerContract
{
    /**
     * The Mailer implementation.
     *
     * @var \Illuminate\Contracts\Mail\Mailer
     */
    protected $mailer;

    /**
     * Create a new mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Send a feedback email to the administration.
     *
     * @param string body
     */
    public function send($body)
    {
        $view    = config('turnkey.feedback.view');
        $subject = config('turnkey.feedback.subject');
        $email   = config('turnkey.feedback.email');

        $this->mailer->send(
            $view, ['body' => $body],
            function (Message $message) use ($subject, $email) {
                $message->to($email)->subject($subject);
            }
        );
    }
}
