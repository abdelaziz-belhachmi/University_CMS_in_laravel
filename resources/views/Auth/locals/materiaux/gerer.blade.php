@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleMat.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make('{{$id}}')" class="dropbtn" >Nouvel materiel</button>
 </div>
<div style="justify-content:center;">


        <main>
    
        <section class="section materiels" id="materiels">
            <div class="wrapper">
                <h1 class="section__title"></h1>
                <p class="section__solg" >Materiaux de la Salle : {{$sname}}</p>
                <div class="three-columns section-content materiels-wrapper" >
                  
                    @foreach ($materiaux as $materiel)
                        
                    <div class="materiel-card">
                            <img src="/images/imagesdep/dep_img.png" class="materiel__img">
                            <div class="materiel-infos">
                                <h3>Nom materiel :{{$materiel->nom_materiel}}</h3>
                                <p>Categorie materiel :{{$materiel->categorie_materiel}}</p>
                                <p> Etat materiel : {{$materiel->etat}}</p>
                                <div id="bouttons-crud" >
                                    @if ($materiel->etat == "en panne")
                                    <button onclick="e('{{$materiel->id}}')" style="background-color: #70a3e0">fixer L'etat Materiel</button>
                                    @endif
                                    
                                    <button onclick="s('{{$materiel->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
                                </div>
                            </div>
                    </div>
                    @endforeach


                </div>
                </div>
        </section>
        
    </div>
    
    
    <script>
        function s(id) {
            alert('are you sure you want to delete meteriel ');
            window.location.href='/materiel/delete/'+id;

        }
        function e(id){
            window.location.href='/materiel/fixer/'+id;
        }
        
        function make(id){
            window.location.href='/materiel/new/'+id;
        }
        
    </script>
    
  
  @endsection