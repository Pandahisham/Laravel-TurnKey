<?php

namespace DraperStudio\TurnKey\Contracts;

interface FeedbackMailer
{
    /**
     * Send a feedback email to the administration.
     *
     * @param string body
     */
    public function send($body);
}
