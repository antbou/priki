<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use Illuminate\Http\Request;
use App\Models\PublicationState;
use Illuminate\Support\Facades\Gate;

class PracticeController extends Controller
{

    public function index()
    {
        if (!Gate::allows('isModo')) {
            return redirect()->route('homepage');
        }

        $domains = Domain::listOfPractices()->get();

        return view('practice.index', ['domains' => $domains]);
    }

    public function show($id)
    {
        $showState = false;
        if (Gate::allows('isModo')) {
            $practice =  Practice::findOrfail($id);
            $showState = !$showState;
        } else {
            $practice =  Practice::isPracticeIsPublished($id)->firstOrFail();
        }

        $user = $practice->user();
        $opinions = $practice->opinions()->get();
        return view('practice.show', ['practice' => $practice, 'user' => $user, 'opinions' => $opinions, 'showState' => $showState]);
    }

    public function publish(Request $request, $id)
    {
        $practice =  Practice::findOrfail($id);
        Gate::authorize('publish', $practice);

        $practice->publication_state_id = PublicationState::findBySlug('PUB')->id;

        if (!$practice->save())
            $this->flashBag($request, 'Une erreur est survenue', 'danger');

        $this->flashBag($request, 'Status mis à jours !');

        return redirect()->route('homepage');
    }
}
