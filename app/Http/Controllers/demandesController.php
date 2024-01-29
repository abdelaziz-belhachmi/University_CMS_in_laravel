<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\demandes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DemandeStatutUpdated;
use Illuminate\Notifications\Notification;

class demandesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::user()->role == 0) {
            $demandes = demandes::where('user_id', Auth::user()->id)->get();
            return view('user/MesDemandes', compact('demandes'));
        } else {
            $demandes = demandes::where('destinataire', Auth::user()->role)->get();
            return view('Auth/demande/gerer_demande', compact('demandes'));
        }
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
        $user = User::all();
        $data = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'destinataire' => 'required|in:1,2,4',
        ]);

        $data['user_id'] = Auth::user()->id;
        $d = demandes::create($data);
        $d->etat_demande = 'enCoursDeTraitement';
        $d->save();
        // Notification::send($user,new DemandeStatutUpdated($request->));

        return redirect()->route("demandes")->with('message', 'Demande saved successfully.');
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
    public function update($id, $nouveau_etat_demande)
    {
        // dd($nouveau_etat_demande);
        // dd($request->input('id'));

        $demande = demandes::where('id', $id)->first();
        // Valider la requête et mettre à jour le statut de la demande
      

        // $nouveau_etat_demande = $request->input('etat_demande');
        // dd($demande);

        $demande->etat_demande = $nouveau_etat_demande;
        $demande->save();

        // Envoyer une notification à l'étudiant avec le nouveau statut de la demande
        // $demande->user->notify(new DemandeStatutUpdated($nouveau_etat_demande));

        return redirect()->back()->with('success', 'Statut de la demande mis à jour avec succès.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $demande = demandes::findOrFail($id);
        $demande->delete();
        return redirect()->back()->with('message', 'Demande deleted successfully.');
    }
}
