@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', 'Mes Notes')
@section('contents')
<style>
  table{
    margin-top: 25px;
    font-size: 15px !important;
    width: 85%;
  }
  input{
    width: 60px !important;
  }

  td, th {
      border: 1px solid #ddd;
      padding: 8px;
    }

  tbody{
    margin-top: 25px !important; 
  }
</style>

<link rel="stylesheet" href="../../../../css/auth_home.css">


 <div style="display: flex;justify-content:center;">
{{-- <form id="formnotes"> --}}
 <table>

 <thead>
  <td>Nom module</td>
 <td>Note du CC 1</td>
 <td>Note du CC 2</td>
 <td>Note du Rattrapage</td>
 <td>Note finale</td>
 </thead>
 
 <tbody>
 
  @foreach ($modules as $module)
   
   @php

      // $module = $e->modules->where('id', $idmodule)->first();
      $nomModule = $module->nom_module;
      $note = $module ? $module->notes->where('etudiants_id', $eid)->first() : null;
      $CC1Value = $note ? $note->CC1 : null;
      $CC2Value = $note ? $note->CC2 : null;
      $RattValue = $note ? $note->Ratt : null;
      $noteFinal = null;

      if( isset($CC1Value) && isset($CC2Value) && isset($RattValue)){
       
        $ccmoy =  ((float)$CC1Value * 0.6 ) + ((float)$CC2Value * 0.4) ;
       
        $noteFinal = $ccmoy >= $RattValue ? $ccmoy : $RattValue;
         
       // if ($noteFinal >10) {
           // $noteFinal = 10;
         // }
      }

    @endphp

  <tr>

    <td>{{$nomModule}}</td>
    <td>{{ $CC1Value  }}</td>
    <td>{{ $CC2Value }}</td>
    <td>{{ $RattValue }}</td>
    <td>{{$noteFinal}}</td>    
  
  </tr>
  
  
  @endforeach


  </tbody>
  </table>



</div>

@endsection