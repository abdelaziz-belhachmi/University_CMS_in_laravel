<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\demandes;
use Illuminate\Support\Facades\Auth;

class demandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd(Auth::user()->id);
        $data = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'destinataire' =>'required|in:1,2,4',
        ]);
        $data['user_id'] =Auth::user()->id;
        demandes::create($data);
        return redirect()->back()->with('message', 'Demande saved successfully.');
        // if checked chef filiere demande htsard end user li endo f role dek 0 aw 1..
        //b switch



    }

    /**
     * Display the specified resource.
     */
    public function showAll(string $id)
    {
        $allDemandes = demandes::all();
        return view('user.demande', compact('allDemandes'));


        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
