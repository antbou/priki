<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Practice;
use App\Models\Changelog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdatePracticeRequest;

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
        $practice =  Practice::findOrfail($id);

        if (!Gate::allows('isModo')) {
            $practice =  Practice::isPublished($id)->firstOrFail();
        }

        return view('practice.show', ['practice' => $practice, 'user' => $practice->user(), 'opinions' => $practice->opinions()->get()]);
    }

    public function update(UpdatePracticeRequest $request, $id)
    {
        $practice =  Practice::findOrfail($id);

        Gate::authorize('update', $practice);

        if ($practice->title != $request->title) {
            Changelog::create([
                'reason' => $request->reason,
                'previously' => $practice->title,
                'user_id' => Auth::user()->id,
                'practice_id' => $practice->id
            ]);

            $practice->title = $request->title;
            if (!$practice->save()) $this->flashBag($request, 'Une erreur est survenue', 'danger');

            $this->flashBag($request, 'Titre mis à jours !');
        }

        return redirect()->route('practice', $id);
    }

    public function publish(Request $request, $id)
    {
        $practice =  Practice::findOrfail($id);

        Gate::authorize('publish', $practice);

        if (!$practice->publish()) $this->flashBag($request, 'Une erreur est survenue', 'danger');

        $this->flashBag($request, 'Status mis à jours !');

        return redirect()->route('homepage');
    }
}
