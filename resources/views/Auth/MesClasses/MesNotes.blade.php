@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')


<link rel="stylesheet" href="../../../../css/auth_home.css">
 <div style="display: flex;justify-content:end;">
<form>
 <table>
 <thead>
 <td> Code d'apogee</td>
 <td>NOM d'etudiant</td>
 <td> PRENOM d'etudiant</td>
 <td>Note du Controle continu 1</td>
 <td>Note du Controle continu 2</td>
 <td>Note finale</td>
 <td>Statut du note</td>
 <td>Note du rattrapage</td>
 <td>statut du note apres rattrapage</td>
 </thead>
 <tbody>
 
  @foreach ($etudiants as $e)
  <tr>
  <td> {{$e->code_apogee}}</td>
  <td> {{$e->user->name}}</td>
  <td> {{$e->user->prenom}}</td>
  <td><input type="number" name="cc1" value="{{ isset($notes[$e->id]) ? $notes[$e->id]->CC1 : '' }}" @if(isset($notes[$e->id])) readonly @endif></td>
  <td><input type="number" name="cc2" value="{{ isset($notes[$e->id]) ? $notes[$e->id]->CC2 : '' }}" @if(isset($notes[$e->id])) readonly @endif></td>

  </tr>
   @endforeach


  </tbody>
  </table>
  <button type="submit">Enregistrer</button>



</div>