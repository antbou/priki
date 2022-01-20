<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;


class DomainController extends Controller
{

    public function showAll()
    {
        $practices = Practice::getAllPublishedPractices();
        return view('domain.domain', ['practices' => $practices]);
    }

    public function show($slug)
    {
        $domain = Domain::findBySlug($slug);
        $practices = $domain->getPublishedPractices()->get();
        return view('domain.domain', ['practices' => $practices, 'domain' => $domain, 'hideDomain' => false]);
    }
}
