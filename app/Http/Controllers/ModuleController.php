<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{


    function afficherTous($id){
        $filr = filiere::where('id',$id)->first();
        $filrnom = $filr->Nom_filliere;
        $modules = module::where('filiere_id',$id)->get();
        return view('Auth/filieres/modules/afficher',compact('modules','filrnom','id'));
    }

    function nouveauModule(Request $req){
        $nv = [

            'code_module'=>$req->input('code'),
            'nom_module'=>$req->input('nom'),
            'description_module'=>$req->input('desc'),
            'semestre'=>(int)$req->input('semestre'),
            'filiere_id'=>$req->input('filiere_id'),
    
        ];
     
        $modl = module::create($nv);
        return redirect(route('gere_filieres'));
       
    }

    function supprimer($id){
        $mdl = module::where('id',$id)->first();
        $mdl->classes()->detach();
        $mdl->delete();
        
        return redirect(route('gere_filieres'));
    }

    function FormulaireDajout($id){
        return view('Auth\filieres\modules\nouveau',compact('id'));
    }
    
    function modifierFormulaire($id){
        $mod = module::where('id',$id)->first();
        return view('Auth/filieres/modules/modifier',compact('id','mod'));
    }

    function modifier(Request $r){
       $modid = $r->input('id');
       $mod = module::where('id',$modid)->first();
      
       $mod->code_module = $r->input('code');
       $mod->nom_module=$r->input('nom');
       $mod->description_module=$r->input('desc');
       $mod->semestre =$r->input('semestre');

       $mod->save();
       return redirect(route('gere_filieres'));
    }

}
