@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleClass.css">


<div style="justify-content:center;">
    <section class="section Classs" id="Classs">
        <div class="wrapper">
            <h1 class="section__title"></h1>
            <p class="section__solg" >Les Modules Disponibles Sans Professeurs Responsable</p>
            <div class="three-columns section-content Classs-wrapper" >
              
                @foreach ($modules as $md)
                    
                <div class="Class-card">
                        <img src="/images/imagesdep/book.png" class="Class__img">
                        <div class="Class-infos">
                            
                            <h3>Module :{{$md->nom_module}}</h3>
                        
                            <div id="bouttons-crud" >
                                {{-- <button onclick="associer('{{$md->id}}')" style="background-color: #70a3e0">modifier atudiant de classe</button> --}}
                                <button onclick="associer('{{$id}}','{{$md->id}}')" style="background-color:rgb(201, 39, 72)">ASSOCIER</button>
                            </div>
                           

                        </div>
                </div>
                @endforeach


            </div>
            </div>
    </section>
    


    </div>
    
    
    <script>
    
       
        function associer(idprof,idmodule){
            window.location.href='/module/associer/'+idprof+'/'+idmodule;
        }
       
    </script>
    
  
  @endsection