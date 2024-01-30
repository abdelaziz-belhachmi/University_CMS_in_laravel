@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleEtud.css">


 
<div style="justify-content:center;">

    
    <section class="section etudiants" id="etudiants">
        <div class="wrapper">
            <h1 class="section__title"></h1>
            <p class="section__solg" > Mes Etudiants</p>
            <div class="three-columns section-content etudiants-wrapper" >
              
                @foreach ($etudiants as $e)
                    
                <div class="etudiant-card">
                        <img src="/images/imagesdep/person.png" class="etudiant__img">
                        <div class="etudiant-infos">
                            
                            <h3>{{$e->user->name}} {{$e->user->prenom}}</h3>

                            <p>Code apogee :{{$e->code_apogee}}</p>
                            <p>Email :{{$e->user->email}}</p>
                            
                           

                        </div>
                </div>
                @endforeach


            </div>
            </div>
    </section>
    


    </div>
    
    
  
  @endsection