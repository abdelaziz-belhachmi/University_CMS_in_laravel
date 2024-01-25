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
        if(Auth::user()->role == 0)
        $demandes = demandes::where('user_id',Auth::user()->id)->get(); 
    else
    $demandes = demandes::where('destinataire',Auth::user()->role)->get(); 
    return view('Auth/demande/gerer_demande', compact('demandes'));


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
        // 0 Etudiant / 1 professor /2 chef filiere / 4 chef_service
       // dd(Auth::user()->id);
        $data = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'destinataire' =>'required|in:1,2,4',
        ]);
        $data['user_id'] =Auth::user()->id;
        demandes::create($data);
        return redirect()->back()->with('message', 'Demande saved successfully.');
      



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
    public function destroy($id)
    {
        //
        $demande = demandes::findOrFail($id);
        $demande->delete();
        return redirect()->back()->with('message', 'Demande deleted successfully.');
    }
}
