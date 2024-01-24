@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleloc.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel local</button>
 </div>
<div style="justify-content:center;">


        <main>
    
        <section class="section locals" id="locals">
            <div class="wrapper">
                <h1 class="section__title"></h1>
                <p class="section__solg" >LOCAUX</p>
                <div class="three-columns section-content locals-wrapper" >
                  
                    @foreach ($locaux as $local)
                        
                    <div class="local-card">
                            <img src="/images/imagesdep/dep_img.png" class="local__img">
                            <div class="local-infos">
                                
                                <h3>Nom Local :{{$local->Nom_local}}</h3>

                                <p>Code local :{{$local->Code_local}}</p>
                                <p>Departement :{{$local->departement->Nom_departement}}</p>
                                
                                <div id="bouttons-crud" >
                                    <button onclick="e('{{$local->id}}')" style="background-color: #70a3e0">Gerer materiaux</button>
                                    <button onclick="s('{{$local->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
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
            alert('are you sure');
            window.location.href='/Auth/local/delete/'+id;

        }
        function e(id){
            window.location.href='/local/gerer/materiaux/'+id;

        }
        function make(){
            window.location.href='/Auth/local/new';
        }
    </script>
    
  
  @endsection