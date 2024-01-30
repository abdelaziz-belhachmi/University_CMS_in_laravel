@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')
<style>
  table{
    margin-top: 25px;
    font-size: 15px !important;
    width: 85%;
  }
  input{
    width: 60px !important;
  }

  thead{
    font-weight:bolder;
    color:white;
    background-color: rgb(135, 208, 218)
  }
  
  td, th {
      border: 1px solid #ddd;
      padding: 8px;
      text-align:  center;
    }

  tbody{
    margin-top: 25px !important; 
  }
</style>

<link rel="stylesheet" href="../../../../css/auth_home.css">


 <div style="display: flex;justify-content:center;">
{{-- <form id="formnotes"> --}}
 <table style="font-family:'Times New Roman', Times, serif ">

 <thead>
 <td>Code d'apogee</td>
 <td>NOM</td>
 <td>PRENOM</td>
 <td>Note du CC 1</td>
 <td>Note du CC 2</td>
 <td>Note du Rattrapage</td>
 <td>Note finale</td>
 </thead>
 
 <tbody>
 
  @foreach ($etudiants as $e)
  <tr>
   
   @php

      $module = $e->modules->where('id', $idmodule)->first();
      $note = $module ? $module->notes->where('etudiants_id', $e->id)->first() : null;
      $CC1Value = $note ? $note->CC1 : 0;
      $CC2Value = $note ? $note->CC2 : 0;
      $RattValue = $note ? $note->Ratt : 0;
      $noteFinal = 0;

      if( isset($CC1Value) && isset($CC2Value) && isset($RattValue)){
       
        $ccmoy = ( ((float)$CC1Value * 0.4 ) + ((float)$CC2Value * 0.6) );
        $noteFinal = $ccmoy >= $RattValue ? $ccmoy : $RattValue;
        
      }

    @endphp

    <td> {{$e->code_apogee}}</td>
    <td> {{$e->user->name}}</td>
    <td> {{$e->user->prenom}}</td>

    <td><input type="number" id='cc1' name="cc1" value="{{ $CC1Value  }}"  readonly ></td>

    <td><input type="number" id='cc2' name="cc2" value="{{ $CC2Value }}" readonly ></td>

    <td><input  type="number" id='ratt' name="ratt" value="{{ $RattValue }}" readonly ></td>
    <td><input type="text"  value="{{$noteFinal}}" disabled></td>    

    <td><button onclick="save(this,'{{$idmodule}}','{{$e->id}}');" style="background-color:rgb(83, 165, 227);padding:8px;color:rgb(239, 239, 239);border-radius:10px; display:none;border:none;">Enregistrer</button>
           <button id="editbtn" onclick="update(this,'{{$idmodule}}','{{$e->id}}');" style="background-color:rgb(85, 226, 69);padding:8px;color:rgb(239, 239, 239);border-radius:10px; border:none;" >Modifier</button>
    </td>


  </tr>
  @endforeach


  </tbody>
  </table>

<script>
async function update(element,idmodule,idetudiant){
  element.style.display = 'none'; 
  element.parentNode.children[0].style.display ='';
  element.parentNode.parentNode.querySelector('td>input#cc1').removeAttribute('readonly');
  element.parentNode.parentNode.querySelector('td>input#cc2').removeAttribute('readonly');
  element.parentNode.parentNode.querySelector('td>input#ratt').removeAttribute('readonly');

}

async function save(element,idmodule,idetudiant){
  await  savecc1(element,idmodule,idetudiant);
  await  savecc2(element,idmodule,idetudiant);
  await  saveratt(element,idmodule,idetudiant);
  element.style.display = 'none'; 
  element.parentNode.children[1].style.display ='';
  location.reload();
}


async function savecc1(element,idmodule,idetudiant){

  cc1 = element.parentNode.parentNode.querySelector('td>input#cc1').value;
  
  route = "/Notes/CC1/"+idetudiant+'/'+idmodule+'/'+cc1;
 
  if (cc1 > 20 || cc1 < 0 ) {
    return;
  }

  const response = await fetch(route);

  const res = await response.json();

  console.log(res);
}

async function savecc2(element,idmodule,idetudiant){

  cc2 = element.parentNode.parentNode.querySelector('td>input#cc2').value;
  
route = "/Notes/CC2/"+idetudiant+'/'+idmodule+'/'+cc2;

if (cc2 > 20 ||  cc2 < 0 ) {
  return;
}

const response = await fetch(route);

const res = await response.json();

console.log(res);
}

async function saveratt(element,idmodule,idetudiant){

  ratt = element.parentNode.parentNode.querySelector('td>input#ratt').value;
 
route = "/Notes/RATT/"+idetudiant+'/'+idmodule+'/'+ratt;


if (ratt > 20 || ratt < 0 ) {
  return;
}

const response = await fetch(route);

const res = await response.json();

console.log(res);
}

</script>

</div>

@endsection