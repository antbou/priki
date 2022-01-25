<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReferenceRequest;
use App\Http\Requests\UpdateReferenceRequest;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reference.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReferenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReferenceRequest $request)
    {

        if (Reference::findByUrl($request->url)->first()) {
            $this->flashBag($request, 'L\'url existe déjà !', 'danger');
            return redirect()->route('reference.index');
        }

        $reference = Reference::create([
            'description' => $request->description,
            'url' => $request->url,
        ]);

        if (!$reference)
            $this->flashBag($request, 'Une erreur est survenue', 'danger');

        $this->flashBag($request, 'Référence postée !');

        return redirect()->route('reference.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferenceRequest  $request
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferenceRequest $request, Reference $reference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        //
    }
}
