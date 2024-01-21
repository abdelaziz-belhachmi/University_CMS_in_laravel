<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audience;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Strings;

class AnnonceController extends Controller
{

    // get annonces based on my role 
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

        })->with(['audience', 'user'])->get();

        return view('Auth.accueil', compact('annonces'));
    }

   
// make annonce
    public function store(Request $request)
    {
        $request->validate([
            'object' => 'required|string',
            'message' => 'required|string',
        ]);

        $audienceData = [
            'visiteur' => $request->has('Visiteurs'),
            'etudiants' => $request->has('Etudiant'),
            'professeurs' => $request->has('Proffesseur'),
            'chef_departement' => $request->has('Chef_Departement'),
            'chef_filliere' => $request->has('Chef_Filiere'),
            'chef_service' => $request->has('Chef_Service'),
        ];

        $audience = Audience::create($audienceData);

        $annonce = new Annonce([
            'titre' => $request->input('object'),
            'description' => $request->input('message'),
            'date_creation' => now(),
            'user_id' => auth()->user()->id,
        ]);
    
        $annonce->audience_id = $audience->id;
        $annonce->save();

        return redirect()->route('Auth.accueil')->with('success', 'Annonce created successfully.');
    }



    
    public function showAll()
    {

        $myId = Auth::user()->id;

        $annonces =  Annonce::where('user_id', $myId)->with(['audience', 'user'])->get();

        return view('Auth.annonce.gerer_annonces', compact('annonces'));
    }
    
    public function showOne($id)
    {
        $annonce = Annonce::with(['audience'])->find($id);

        return view('Auth.annonce.modifier_annonce', compact('annonce'));
    }

    public function edit(Request $request)
    {
  
            $annonce = Annonce::with('audience')->findOrFail($request->input('id'));

            $annonce->titre = $request->input('object');
            $annonce->description = $request->input('message');

            $annonce->save();

            $audience = $annonce->audience;
            $audience->visiteur = $request->has('Visiteurs');
            $audience->etudiants = $request->has('Etudiant');
            $audience->professeurs = $request->has('Proffesseur');
            $audience->chef_departement = $request->has('Chef_Departement');
            $audience->chef_filliere = $request->has('chef_filliere');
            $audience->chef_service = $request->has('Chef_Service');

            $audience->save();

            return redirect(route('Auth.accueil'));
    }


// 
    public function destroy($id)
{
    $annonce = Annonce::findOrFail($id);
    $annonce->audience()->delete();
    $annonce->delete();

    return redirect()->route('Auth.annonce.gerer_annonces')->with('success', 'Annonce deleted successfully.');
}
    

// 
    public function delete_annonce(Annonce $annonce)
    {
        $annonce->delete();

        return redirect()->route('annonce.index')->with('success', 'Annonce deleted successfully.');
    }

}
