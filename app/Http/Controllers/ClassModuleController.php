<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\module;
use Illuminate\Http\Request;

class ClassModuleController extends Controller
{
    //

    function afficherform($id){
        $unregisteredClasses = Classe::whereDoesntHave('modules', function ($query) use ($id) {
            $query->where('modules_id', $id);
        })->get();
        return view('Auth/filieres/modules/associer',compact('unregisteredClasses','id'));
    }

    function associer($idModule,$idClass){

   // Find the class and module by their IDs
   $class = classe::find($idClass);
   $module = module::find($idModule);

   // Check if both the class and module exist
   if ($class && $module) {
       // Attach the module to the class
       $class->modules()->attach($module);

       // You can add additional logic or redirect to a specific route if needed
       return redirect()->back();

   } else {

       return redirect()->back()->with('error', 'Class or Module not found.');
   }

        // return redirect(route(''));
    }
}
