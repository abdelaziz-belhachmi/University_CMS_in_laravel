<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{

    public function index()
    {
        
        $myRole = Auth::user()->role;
        
        switch ($myRole) {
            case 0:
                $userRole = "etudiants";
                break;
            case 1:
                $userRole = "professeurs";
                break;
            case 2:
                $userRole = "chef_filliere";
                break;
            case 3:
                $userRole = "chef_departement";
                break;
            case 4:
                $userRole = "chef_service";
                break;
            default:
                $userRole = "etudiants";
        }

        $annonces = Annonce::whereHas('audience', function ($query) use ($userRole) {
                
            $query->where($userRole, true);

        })->with('audience')->get();

        return view('Auth.accueil', compact('annonces'));
    }


   

    public function store(Request $request)
    {
        $request->validate([
            'object' => 'required|string',
            'message' => 'required|string',
        ]);


        // Create the Audience based on the form values
        $audienceData = [
            'visiteur' => $request->has('Visiteurs'),
            'etudiants' => $request->has('Etudiant'),
            'professeurs' => $request->has('Proffesseur'),
            'chef_departement' => $request->has('Chef_Departement'),
            'chef_filliere' => $request->has('Chef_Filiere'),
            'chef_service' => $request->has('Chef_Service'),
        ];

        $audience = Audience::create($audienceData);

        // Create the Annonce with title, description, date_creation, and associate it with the Audience
        $annonce = new Annonce([
            'titre' => $request->input('object'),
            'description' => $request->input('message'),
            'date_creation' => now(),
        ]);
    
        $annonce->audience_id = $audience->id;
        $annonce->save();


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
