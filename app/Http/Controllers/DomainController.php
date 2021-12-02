<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;


class DomainController extends Controller
{

    public function showAll()
    {
        $practices = Practice::all();
        return view('domain.domain', ['practices' => $practices]);
    }

    public function show($slug)
    {
        $domain = Domain::findBySlug($slug);
        $practices = $domain->practices()->get();
        return view('domain.domain', ['practices' => $practices, 'domain' => $domain, 'hideDomain' => false]);
    }
}
