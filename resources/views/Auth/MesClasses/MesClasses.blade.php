@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleClass.css">


 <div style="display: flex;justify-content:end;">
    @if(Auth::user()->role == 4)

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="ajouter();" class="dropbtn" >Nouveau Class</button>
@endif
    </div>
<div style="justify-content:center;">

    
    <section class="section Classs" id="Classs">
        <div class="wrapper">
            <h1 class="section__title"></h1>
            <p class="section__solg" >Mes Classes</p>
            <div class="three-columns section-content Classs-wrapper" >
              
                @foreach ($Myclasses as $Cl)
                    
                <div class="Class-card">
                        <img src="/images/imagesdep/classroom.png" class="Class__img">
                        <div class="Class-infos">
                            
                            <h3>Classe :{{$Cl->nom_classe}}</h3>

                         
                            <div id="bouttons-crud" >
                                {{-- <button onclick="associer('{{$Cl->id}}')" style="background-color: #70a3e0">modifier atudiant de classe</button> --}}
                                <button onclick="etu('{{$Cl->id}}')" style="background-color:rgb(201, 39, 72)">Les Etudiants</button>
                                <button onclick="notes('{{$Cl->id}}','{{$id}}')" style="background-color:rgb(61, 120, 196)">Les Notes</button>

                            </div>
                           

                        </div>
                </div>
                @endforeach


            </div>
            </div>
    </section>
    


    </div>
    
    
    <script>
        function etu(id){
            window.location.href='/MesEtudiants/'+id;
        }
       
        function dessocier(id){
            window.location.href='/class/dessocier/'+id;
        }
        function notes(id,moduleID){
            window.location.href='/LesNotes/'+moduleID+'/'+id;
        }
       
    </script>
    
  
  @endsection