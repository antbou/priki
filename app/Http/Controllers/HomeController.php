<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PublicationState;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        Carbon::setLocale('fr');

        $days = ($request->has('days') && is_numeric($request->input('days'))) ? $request->input('days') : Practice::DAYS;

        $practices = PublicationState::where('slug', 'PUB')->first()->practices()->where('updated_at', '>=', Carbon::now()->subDays($days))->get();

        return view('home.home', ['practices' => $practices]);
    }
}
