<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;


class DomainController extends Controller
{

    public function showAll()
    {
        return view('domain.domain', ['practices' => Practice::publishedPractices()]);
    }

    public function show($slug)
    {
        $domain = Domain::findBySlug($slug);
        $practices = $domain->getPublishedPractices()->get();
        return view('domain.domain', ['practices' => $practices, 'domain' => $domain]);
    }
}
