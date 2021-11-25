<?php

namespace App\Http\Controllers;

use App\Models\PublicationState;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function show()
    {
        Carbon::setLocale('fr');
        $practices = PublicationState::where('slug', 'PUB')->first()->practices;

        return view('home.home', ['practices' => $practices]);
    }
}
