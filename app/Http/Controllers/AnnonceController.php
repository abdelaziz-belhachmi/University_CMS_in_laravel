<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Models\Annonce;

class AnnonceController extends Controller
{

    public function index()
    {
        $annonces = Annonce::with('audience')->get();
        return view('Auth.accueil', compact('annonces'));
    }


   

    public function store(Request $request)
    {
        // $request->validate([
        //     'object' => 'required|string',
        //     'message' => 'required|string',
        //     // Add other validation rules as needed
        // ]);

        // Create the Annonce with title, description, and date_creation
        $annonce = Annonce::create([
            'titre' => $request->input('object'), // 'object' corresponds to the title in the form
            'description' => $request->input('message'), // 'message' corresponds to the description in the form
            'date_creation' => now(), // Use now() to get the current date and time
        ]);

        // Create the Audience based on the form values
        $audienceData = [
            'visiteur' => $request->has('Visiteurs') ? 1 : 0,
            'etudiants' => $request->has('Etudiant') ? 1 : 0,
            'professeurs' => $request->has('Proffesseur') ? 1 : 0,
            'chef_departement' => $request->has('Chef_Departement') ? 1 : 0,
            'chef_filliere' => $request->has('Chef_Filiere') ? 1 : 0,
            'chef_service' => $request->has('Chef_Service') ? 1 : 0,
        ];

        $annonce->audience()->create($audienceData);

        return redirect()->route('Auth.accueil')->with('success', 'Annonce created successfully.');
    }



    public function show(Annonce $annonce)
    {
        return view('annonce.show', compact('annonce'));
    }

    public function edit(Annonce $annonce)
    {
        $audiences = Audience::all();
        return view('annonce.edit', compact('annonce', 'audiences'));
    }

    public function update(Request $request, Annonce $annonce)
    {
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'date_creation' => 'required|date',
            'audience_id' => 'required|exists:audiences,id',
        ]);

        $annonceData = $request->all();

        // You can customize this logic based on your needs
        $audience = Audience::find($annonceData['audience_id']);

        if (!$audience->visiteur && !$audience->etudiants && !$audience->professeurs
            && !$audience->chef_departement && !$audience->chef_filliere && !$audience->chef_service) {
            return redirect()->back()->with('error', 'Annonce cannot be updated. No target audience selected.');
        }

        $annonce->update($annonceData);

        return redirect()->route('annonce.index')->with('success', 'Annonce updated successfully.');
    }

    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonce.index')->with('success', 'Annonce deleted successfully.');
    }

}
