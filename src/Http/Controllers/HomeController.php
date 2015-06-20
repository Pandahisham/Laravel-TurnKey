<?php

namespace DraperStudio\TurnKey\Http\Controllers;

use DraperStudio\TurnKey\Contracts\TurnKeyRepository;
use DraperStudio\TurnKey\Http\Requests\DeleteAccountRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller;
use Illuminate\Session\SessionManager;

class HomeController extends BaseController
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The TurnKeyRepository implementation.
     *
     * @var TurnKeyRepository
     */
    protected $turnkey;

    /**
     * Create a new controller instance.
     *
     * @param $auth \Illuminate\Contracts\Auth\Guard
     * @param $turnkey \DraperStudio\TurnKey\Contracts\TurnKeyRepository
     * @param $session \Illuminate\Session\SessionManager
     */
    public function __construct(Guard $auth, TurnKeyRepository $turnkey, SessionManager $session)
    {
        parent::__construct($session);

        $this->middleware('auth');

        $this->auth = $auth;
        $this->turnkey = $turnkey;
    }

    /**
     * Show the application close account form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('turnkey::form');
    }

    /**
     * Handle a close account request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function handle(DeleteAccountRequest $request)
    {
        $identifier = config('turnkey.identifier');

        $credentials = [
            $identifier => $this->auth->user()->$identifier,
            'password' => $request->get('password'),
        ];

        if ($this->auth->validate($credentials)) {
            $this->turnkey->erase($this->auth->id());

            $this->auth->logout();

            $next = config('turnkey.feedback.active') ? 'turnkey.feedback'
                                                      : 'turnkey.goodbye';

            $this->flashSessionKey();

            return redirect()->route($next);
        }

        return redirect(config('turnkey.urls.index'))
                    ->withErrors([
                        'invalid' => 'These credentials do not match our records.',
                    ]);
    }
}
