<?php

namespace DraperStudio\TurnKey\Http\Controllers;

use DraperStudio\TurnKey\Contracts\FeedbackMailer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Session\SessionManager;

class FeedbackController extends BaseController
{
    /**
     * The FeedbackMailer implementation.
     *
     * @var FeedbackMailer
     */
    protected $turnkey;

    /**
     * Create a new controller instance.
     *
     * @param $mailer \DraperStudio\TurnKey\Contracts\FeedbackMailer
     * @param $session \Illuminate\Session\SessionManager
     */
    public function __construct(FeedbackMailer $mailer, SessionManager $session)
    {
        parent::__construct($session);

        $this->mailer = $mailer;
    }

    /**
     * Show the application feedback form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->validateSession();

        return view('turnkey::feedback');
    }

    /**
     * Handle a feedback request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        if ($request->has('body')) {
            $this->mailer->send($request->get('body'));
        }

        $this->flashSessionKey();

        return redirect()->route('turnkey.goodbye');
    }
}
