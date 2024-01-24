@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleMat.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel materiel</button>
 </div>
<div style="justify-content:center;">


        <main>
    
        <section class="section materiels" id="materiels">
            <div class="wrapper">
                <h1 class="section__title"></h1>
                <p class="section__solg" >materiaux de la Salle : {{}}</p>
                <div class="three-columns section-content materiels-wrapper" >
                  
                    @foreach ($materiaux as $materiel)
                        
                    <div class="materiel-card">
                            <img src="/images/imagesdep/dep_img.png" class="materiel__img">
                            <div class="materiel-infos">
                                
                                <h3>Nom materiel :{{/**/}}</h3>
                                <p>Code materiel :{{/**/}}</p>
                                <p> Etat materiel : {{/**/}}</p>
                                
                                <div id="bouttons-crud" >
                                    <button onclick="e('{{/**/}}')" style="background-color: #70a3e0">Gerer materiaux</button>
                                    <button onclick="s('{{/**/}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
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
            window.location.href='/materiel/gerer/'+id;

        }
        function make(){
            window.location.href='/materiel/new';
        }
    </script>
    
  
  @endsection