@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', 'profil')
@section('contents')

<link rel="stylesheet" href="../css/profil.css">

<div id="sectionProfile">


<div id="profil">
    <img src ="/images/userpic.jpg">
    <h1 style="color: #555"> {{ $user->name}} {{ $user->prenom }}</h1>
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

            @if(isset($class))
            <li id="annee currente">Class Inscris: {{$class->nom_classe}} </li>
            @endif

        @if(isset($filires))
<ol>
            @foreach ($filires as $filiere)
                <h1 style="color:#555">{{$filiere->Nom_filliere}}</h1>

                @if(isset($modules))
                    @foreach($modules as $module)
                        <li id="modules"> Module :{{$module->nom_module}} </li>
                    @endforeach
                @endif

            @endforeach
</ol>

        @endif

        </ul>
</div>


</div>

</div>

@endsection