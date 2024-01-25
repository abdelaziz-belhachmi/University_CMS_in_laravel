@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/stylemod.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="ajouter();" class="dropbtn" >Nouveau module</button>
 </div>
<div style="justify-content:center;">

    
    <section class="section Modules" id="Modules">
        <div class="wrapper">
            <h1 class="section__title"></h1>
            <p class="section__solg" >Modules</p>
            <div class="three-columns section-content Modules-wrapper" >
              
                @foreach ($modules as $md)
                    
                <div class="Module-card">
                        <img src="/images/imagesdep/dep_img.png" class="Module__img">
                        <div class="Module-infos">
                            
                            <h3>Nom Module :{{$md->Nom_filliere}}</h3>

                            <p>Code Module :{{$md->Code_Module}}</p>
                            <p>Departement :{{$md->departement->Nom_departement}}</p>
                            
                            <div id="bouttons-crud" >
                                <button onclick="modifier('{{$md->id}}')" style="background-color: #70a3e0">Modifier Module</button>
                                <button onclick="gerer('{{$md->id}}')" style="background-color: #9cc8ff">gerer Module</button>
                                <button onclick="supprimer('{{$md->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
                            </div>

                        </div>
                </div>
                @endforeach


            </div>
            </div>
    </section>
    


    </div>
    
    
    <script>
        function supprimer(id) {
            window.location.href='/module/supprimer/'+id;

        }
        function modifier(id){
            window.location.href='/module/modifier/'+id;

        }
        function ajouter(id){
            window.location.href='/Auth/filieres/modules/nouveau/'+id;
        }
    </script>
    
  
  @endsection