<?php

namespace App\Http\Controllers;

use App\Models\Opinion;
use App\Models\UserOpinion;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserOpinionRequest;

class OpinionController extends Controller
{
    public function storeUserOpinion(StoreUserOpinionRequest $request, $id)
    {
        $opinion = Opinion::findOrFail($id);
        $data = $request->only('comment') + [
            'points' => 0,
            'user_id' => Auth::user()->id,
            'opinion_id' => $opinion->id
        ];

        $userOpinion = UserOpinion::create($data);

        if (!$userOpinion) {
            $request->session()->flash('flash_message', 'Une erreur est survenue');
            $request->session()->flash('flash_type', 'text-red-400');
        }

        $request->session()->flash('flash_message', 'Task was successful!');
        $request->session()->flash('flash_type', 'text-green-400');

        return redirect()->route('practice', $opinion->practice());
    }
}
