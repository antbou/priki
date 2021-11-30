<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PublicationState;


class HomeController extends Controller
{
    public function show()
    {
        Carbon::setLocale('fr');
        return view('home.home');
    }
}
