@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/stylefil.css">


 <div style="display: flex;justify-content:end;">
    @if(Auth::user()->role == 4)

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Filiere</button>
 @endif
    </div>
<div style="justify-content:center;">

    {{-- @foreach ( $fil as $f) --}}
    {{-- <h2 style="margin:20px">{{$f->Nom_filliere }}</h2> --}}
    <section class="section Filieres" id="Filieres">
        <div class="wrapper">
            <h1 class="section__title"></h1>
            <p class="section__solg" >Filieres</p>
            <div class="three-columns section-content Filieres-wrapper" >
              
                @foreach ($fil as $f)
                    
                <div class="Filiere-card">
                        <img src="/images/imagesdep/filiere.png"  class="Filiere__img">
                        <div class="Filiere-infos">
                            
                            <h3>Nom Filiere :{{$f->Nom_filliere}}</h3>

                            <p>Code Filiere :{{$f->Code_filiere}}</p>
                            <p>Departement :{{$f->departement->Nom_departement}}</p>
                            
                            <div id="bouttons-crud" >

                                @if(Auth::user()->role == 4)

                                <button onclick="e('{{$f->id}}')" style="background-color: #70a3e0">Modifier filiere</button>
                                <button onclick="g('{{$f->id}}')" style="background-color: #9cc8ff">gerer filiere</button>
                                <button onclick="s('{{$f->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
                                    
                                @endif

                                @if(Auth::user()->role == 3)
                                <button onclick="g('{{$f->id}}')" style="background-color: #9cc8ff">Les Modules du filiere</button>

                                @endif

                              
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
            window.location.href='/Auth/filiers/delete/'+id;

        }
        function e(id){
            window.location.href='/Auth/filiers/edit/'+id;

        }
        function make(){
            window.location.href='/Auth/filiers/new';
        }
        function g(id){
            window.location.href='/Auth/filieres/modules/afficher/'+id;
        }
    </script>
    
  
  @endsection