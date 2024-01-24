@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleDep.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Departemet</button>
 </div>
<div style="justify-content:center;">


        <main>
    
        <section class="section departements" id="departements">
            <div class="wrapper">
                <h1 class="section__title"></h1>
                <p class="section__solg" >DÉPARTEMENTS</p>
                <div class="three-columns section-content departements-wrapper" >
                  
                    @foreach ($dep as $d)
                        
                    <div class="departement-card">
                            <img src="/images/imagesdep/dep_img.png" class="departement__img">
                            <div class="departement-infos">
                                
                                <h3>{{$d->Nom_departement}}</h3>

                                <p>{{$d->Code_departement}}</p>
                                
                                @if ($d->chefDepartement)
                                <p>Chef : {{$d->chefDepartement->user->name}} {{$d->chefDepartement->user->prenom}}</p>
                                <p>Email : {{$d->chefDepartement->user->email}}</p>
                                @endif
                                
                                <div id="bouttons-crud" >
                                    <button onclick="e('{{$d->id}}')" style="background-color: #70a3e0">Modifier</button>
                                    <button onclick="s('{{$d->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
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
            window.location.href='/Auth/departements/delete/'+id;

        }
        function e(id){
            window.location.href='/Auth/departements/edit/'+id;

        }
        function make(){
            window.location.href='/Auth/departements/new';
        }
    </script>
    
  
  @endsection