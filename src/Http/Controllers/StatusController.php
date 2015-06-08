<?php

namespace DraperStudio\TurnKey\Http\Controllers;

class StatusController extends BaseController
{
    /**
     * Show the application goodbye to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function goodbye()
    {
        $this->validateSession();

        return view('turnkey::goodbye');
    }

    /**
     * Show the application staying to the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function staying()
    {
        return view('turnkey::staying');
    }
}
