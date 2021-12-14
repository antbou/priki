<?php

namespace App\Http\Controllers;

use App\Models\Practice;

class PracticeController extends Controller
{
    public function show($id)
    {
        $practice =  Practice::isPracticeIsPublished($id)->firstOrFail();
        $user = $practice->user();

        return view('practice.show', ['practice' => $practice, 'user' => $user]);
    }
}
