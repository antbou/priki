<?php

namespace App\Http\Controllers;

use Carbon\Carbon;


class DomainController extends Controller
{
    public function show()
    {
        Carbon::setLocale('fr');
        return view('domain.home');
    }
}
