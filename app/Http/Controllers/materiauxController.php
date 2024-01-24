<?php

namespace App\Http\Controllers;

use App\Models\local;
use App\Models\materiaux;
use Illuminate\Http\Request;

class materiauxController extends Controller
{
    //
    function getAll($id){
        $s = local::where('id',$id)->first();
        $sname = $s->Nom_local;
        $materiaux = materiaux::where('local_id',$id)->get();
        return view('Auth/locals/materiaux/gerer',compact('materiaux','sname','id'));
    }

    function showFormulaire($id){
        return view('Auth\locals\materiaux\new',compact('id'));
    }

    function newMateriel(Request $r){
        $data = [
            'nom_materiel'=>$r->input('nom_materiel'),
            'categorie_materiel'=>$r->input('categorie_materiel'),
            'etat'=>$r->input('etat'),
            'local_id'=>$r->input('local_id'),
        ];
        
        $m = materiaux::create($data);
        return redirect(route('gere_locals'));
    }

    function supprimer($id){
        $materiaux = materiaux::where('id',$id)->first();
        $materiaux->delete();
        return redirect(route('gere_locals'));
    }

    function fixerEtat($id){
        $materiaux = materiaux::where('id',$id)->first();
        $materiaux->etat = "fonctionnel";
        $materiaux->save();
        return redirect(route('gere_locals'));

    }

}
