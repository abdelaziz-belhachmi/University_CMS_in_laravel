@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Filiere</button>
 </div>
<div style="justify-content:center;">

    @foreach ( $fil as $f)
    <div style="display: flex;justify-content:center">

        <div style="display: flex; width:50%;">
            <h2 style="margin:20px">{{$f->Nom_filliere }}</h2>
            <div style="display:flex;align-items:stretch">
                <button style="padding:18px;margin: 10px" onclick="e({{$f->id}})">modifier</button>
                <button  onclick="s({{$f->id}})"  style="padding:18px;margin: 10px;background-color:#d70000;color:aliceblue;"  >supprimer </button>
            </div>
        </div>
    </div>

    @endforeach
    
    </div>
    
    
    <script>
        function s(id) {
            window.location.href='/Auth/filiers/delete/'+id;

        }
        function e(id){
            window.location.href='/Auth/filiers/edit/'+id;

        }
        function make(){
            window.location.href='/Auth/filiers/new';
        }
    </script>
    
  
  @endsection