@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Departemet</button>
 </div>
<div style="justify-content:center;">

    @foreach ( $dep as $d)
    <div style="display: flex;justify-content:center">

        <div style="display: flex; width:50%;">
            <h2 style="margin:20px">{{$d->Nom_departement}}</h2>
            <div style="display:flex;align-items:stretch">
                <button style="padding:18px;margin: 10px" onclick="e({{$d->id}})">modifier</button>
                <button  onclick="s({{$d->id}})"  style="padding:18px;margin: 10px;background-color:#d70000;color:aliceblue;"  >supprimer </button>
            </div>
        </div>
    </div>

    @endforeach
    
    </div>
    
    
    <script>
        function s(id) {
            window.location.href='/Auth/departements/delete/'+id;

        }
        function e(id){
            window.location.href='/Auth/departements/edit/'+id;

        }
        function make(){
            window.location.href='/Auth/departements/new';
        }
    </script>
    
    {{-- <script src="../../../../js/auth_home.js"></script> --}}
    
  @endsection