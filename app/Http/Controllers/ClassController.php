<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Etudiant;
use App\Models\module;
use App\Models\reservation;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    
    function getAll(){
        $AllClasses = classe::all();

        return view('Auth/filieres/class/afficher',compact('AllClasses'));
    }

    function Formulairenouveau(){
        $etudiants = Etudiant::whereNull('classes_id')->get();
        return view('Auth/filieres/class/nouveau',compact('etudiants'));
    }


    public function nouveauClass(Request $request)
    {

        $studentIds = request('student_ids');

        if ($studentIds == null){
          return redirect()->back()->with('error','veuillez choisir aux moins un etudiant pour créer une class !');
        }

        $newClass = classe::create([
            'nom_classe' => $request->input('nom'),
        ]);
          
      $newClassId = $newClass->id;
     
     
        foreach ($studentIds as $studentId) {
            $student = Etudiant::where('user_id',$studentId);
        
            if ($student) {
                $student->update(['classes_id' => $newClassId]);
            } 
        }

        return redirect(route('gerer_classes'));
    }

    public function delete($id)
    {
        // Find students with the specified classes_id
        $students = Etudiant::where('classes_id', $id)->get();
    

        // Update classes_id to null for each student
        foreach ($students as $student) {
            $student->classes_id = null;
            $student->save();
        }
        
    
        // dd($students);

        // Find and delete the class
        $class = classe::find($id);
        $class->modules()->detach();
    
        if ($class) {
            $reser = reservation::where('classes_id',$id)->get();
            foreach ($reser as $res){
                $res->delete();
            }

            $class->delete();
        }
    
        return redirect(route('gerer_classes'));
    }
    function AfficherEtudiants($id){
        $etudiants=Etudiant::where('classes_id',$id)->get();
        $classID = $id;
        return view('/Auth/MesClasses/AfficherMesetudiants',compact('etudiants','classID'));
    }
}
