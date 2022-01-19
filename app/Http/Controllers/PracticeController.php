<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{

    public function index()
    {
        if (!Gate::allows('isModo')) {
            return redirect()->route('homepage');
        }

        $domains = Practice::all()->sortBy('publication_state_id')->groupBy('domain_id');

        return view('practice.index', ['domains' => $domains]);
    }

    public function show($id)
    {
        $practice =  Practice::isPracticeIsPublished($id)->firstOrFail();
        $user = $practice->user();
        $opinions = $practice->opinions()->get();
        return view('practice.show', ['practice' => $practice, 'user' => $user, 'opinions' => $opinions]);
    }
}
