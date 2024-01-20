@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">
<link rel="stylesheet" href="../../../css/personnes_style.css">
{{-- <h1>afficher ici dashboard de curd annonces</h1> --}}
<div style="background-color:rgb(0, 0, 0);min-height:57px ;margin-left:200px; display:flex;justify-content:center; ">
   
        <button style="height:57px;margin-inline:2vw" class="dropbtn" onclick="show(4);" >Chef Services</button>
        <button style="height:57px;margin-inline:2vw" class="dropbtn" onclick="show(3);" >Chef Departements</button>
        <button style="height:57px;margin-inline:2vw" class="dropbtn" onclick="show(2);" >Chef Filieres</button>
        <button style="height:57px;margin-inline:2vw" class="dropbtn" onclick="show(1);" >Proffesseurs</button>
        <button style="height:57px;margin-inline:2vw" class="dropbtn" onclick="show(0);" >Etudiants</button>
        <button  style="height:57px;margin-inline:2vw;color:rgb(0, 202, 135)" onclick="show('new')" class="dropbtn" >Nouvel Utilisateur</button>
       
    
</div>

<div class="larg">

@foreach ( $utilisateurs as $utilisateur)
    <div style="display: flex">
        <h2 style="margin:20px">{{$utilisateur->user->name}}</h2>
        <div style="display:flex;align-items:stretch">
            <button style="padding:18px;margin: 10px" onclick="url({{$utilisateur->user->id}})">modifier</button>
            <button style="padding:18px;margin: 10px;background-color:#c61717;color:aliceblue">supprimer</button>

        </div>
    </div>
@endforeach

</div>




<script src="../../../js/auth_home.js"></script>
<script>
    function url($x){
        window.location.href= '/personnelles/modifier/'+$x;
        
    }
    function show(x){
        switch (x) {

                case 0:
                window.location.href='/Auth/gerer/etudiants';
                break;
                case 1: 
                window.location.href='/Auth/gerer/Proffesseurs';
                break;
                case 2:
                window.location.href='/Auth/gerer/Chef_Filieres';
                break;
                case 3:
                window.location.href='/Auth/gerer/Chef_Departements';
                break;
                case 4:
                window.location.href='/Auth/gerer/Chef_Services';
                break;
    
            case 'new':
            window.location.href='/Auth/register';

                break;
        }
        
    }
</script>

  @endsection