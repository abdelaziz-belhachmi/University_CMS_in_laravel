@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', 'profil')
@section('content')

<link rel="stylesheet" href="../css/profil.css">


<div id="profil">
    <img src ="/images/userpic.jpg">
    <h3> Nom et prenom</h3>
    <p>CNE:</p>
    <p>CNI:</p>

</div>
<div id ="infos_etudes">
<ul>
    <li id="annee currente">Annee currente:</li>
    <li id="filiere">La filiere: </li>
    <li id="codapogee">Code d'apogee:</li>
</ul>

</div>
<div id ="infos_pers">
    <ul>
        <li id="adresse">Adresse: </li>
        <li id="bdd">Date de naissance: </li>
        <li id="email"> Email:</li>
    </ul>
 
</div>