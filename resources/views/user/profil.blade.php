@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', 'profil')
@section('contents')

<link rel="stylesheet" href="../css/profil.css">

<div id="sectionProfile">


<div id="profil">
    <img src ="/images/userpic.jpg">
    <h3> {{ $user->name}} {{ $user->prenom }}</h3>
    <p>CNE: {{ $etudiant->cne }}</p>
    <p>CNI: {{ $user->cin }}</p>

</div>


<div style="display: flex;">

<div id ="infos_pers" style="padding: 50px">
    <ul>
        <li id="adresse">Adresse: {{ $user->adresse}}</li>
        <li id="ville">ville: {{ $user->ville}}</li>

        <li id="bdd">Date de naissance: {{ $user->date_naissance}} </li>
        <li id="email"> Email:  {{ $user->email}} </li>
    </ul>
 
</div>


<div id ="infos_etudes" style="padding: 50px">
        <ul>

            <li id="codapogee">Code d'apogee: {{$etudiant->code_apogee}}</li>

            @if($class)
            <li id="annee currente">Class Inscris: {{$class->class_name}} </li>
            @endif

            @if($modules)
                @foreach($modules as $module)
                    <li id="modules">{{$module->nom_module}}  '{{filiere::where('id',$module->filiere_id)->first()->nom_filiere}} '</li>
                @endforeach
            @endif

        </ul>
</div>


</div>



</div>

@endsection