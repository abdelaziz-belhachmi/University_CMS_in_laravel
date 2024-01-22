<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    //

    function Afficher_formulaire()
    {
        return view('Auth/departements/new');
    }

    function getAll(){
        $dep = [];
        $dep = Departement::all();
        return view('Auth/departements/gerer',compact('dep'));
    }


    function getOne($id){
        $de = Departement::where('id',$id)->first();
        return view( 'Auth/departements/modifier' , compact('de'));
    }

    function edit(Request $r)  {
        $newdata = [
            'Code_departement' => $r->input('code'),
            'Nom_departement' =>$r->input('nom'),
            'Description' => $r->input('desc'),
        ];
        
        $depa = Departement::findOrFail($r->input('id'));

        $depa->Code_departement = $r->input('code');
        $depa->Nom_departement = $r->input('nom');
        $depa->Description = $r->input('desc');

        $depa->save();
        return $this->getAll();
    }
    function create(Request $r){
        $data = [
            'Code_departement' => $r->input('code'),
            'Nom_departement' =>$r->input('nom'),
            'Description' => $r->input('desc'),
        ];
        $depa = Departement::create($data);
        return $this->getAll();
    }


    
    function delete($id){
        $de = Departement::where('id',$id)->first();
        $de->delete();
        return $this->getAll();
    }
}
