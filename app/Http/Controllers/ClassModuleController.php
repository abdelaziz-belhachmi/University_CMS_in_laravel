<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassModuleController extends Controller
{
    //
    function afficherform($id) {

        // this code return possible classes to register in the module with $id
        // if there are classes registred in that module , will not be included 
        // if there are classes previously registred in modules in other filiere , will not be included also , here i ensure i only get classes that belong to filiere of this module , or classes that are not assigned yet to any filiere. 

        $module = module::findOrFail($id);
        $filiereID = $module->filiere_id;

        $unregisteredClasses = classe::where(function ($query) use ($filiereID, $id) {
            $query->whereHas('modules', function ($innerQuery) use ($filiereID, $id) {
                $innerQuery->where('filiere_id', $filiereID)
                    ->where('modules_id', '!=', $id);
            })->orWhereDoesntHave('modules');
        })
        ->orWhereHas('modules', function ($query) use ($filiereID, $id) {
            $query->where('filiere_id', $filiereID)
                ->where('modules_id', '!=', $id);
        })
        ->get();  
            
        return view('Auth/filieres/modules/associer', compact('unregisteredClasses', 'id'));
    }
    

    // function afficherform($id){

    //     $md = module::where('id',$id)->first();
    //     $filierID = $md->filiere_id;

    //     $unregisteredClasses = Classe::whereDoesntHave('modules', function ($query) use ($id) {
    //         $query->where('modules_id', $id);
    //     })->get();
        
    //     return view('Auth/filieres/modules/associer',compact('unregisteredClasses','id'));
    // }

function MesClasses(){
    $myID = Auth::user()->professeur->id;
    
    $Mymodule = module::where('professeurs_id',$myID)->first();

    if($Mymodule){
    $id = $Mymodule->id;
    $Myclasses = Classe::whereHas('modules', function ($query) use ($id) {
        $query->where('modules_id', $id);
    })->get();

    // $Myclasses = Classe::where('modules',$Mymodule)->get();
    return view('Auth/MesClasses/MesClasses',compact('Myclasses'));
}
else{
    $Myclasses = [];
return view('Auth/MesClasses/MesClasses',compact('Myclasses'));
}
}



function associer($idModule,$idClass){

   // Find the class and module by their IDs
   $class = classe::find($idClass);
   $module = module::find($idModule);

   // Check if both the class and module exist
   if ($class && $module) {
       $class->modules()->attach($module);

       return redirect()->back();
   } else {

       return redirect()->back()->with('error', 'Class or Module not found.');
   }

    }
}
