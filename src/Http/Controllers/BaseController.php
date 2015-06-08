<?php

namespace DraperStudio\TurnKey\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Session\SessionManager;

class BaseController extends Controller
{
    /**
     * The SessionManager implementation.
     *
     * @var \Illuminate\Session\SessionManager
     */
    protected $session;

    /**
     * Create a new controller instance.
     *
     * @param SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Validate that the TurnKey session-key is available.
     *
     * @return \Illuminate\Http\Response|bool
     */
    protected function validateSession()
    {
        if (!$this->session->has('turnkey')) {
            return abort(403);
        }
    }

    /**
     * Flash the TurnKey session-key for the next request.
     */
    protected function flashSessionKey()
    {
        $this->session->flash('turnkey', true);
    }
}
