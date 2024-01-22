@extends('auth.home') 
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/filiers/edit" id="contactForm" method="post">
              @csrf
              <span>Code Filiere</span>
              <input type="text" name="code" class="code" placeholder="Enter l'object" value="{{$filiere->Code_filiere}}" />
              
              <span>Nom Filiere</span>
              <input type="text" name="nom" class="nom" placeholder="Enter l'object" value="{{$filiere->Nom_filliere}}" />
              
              
              <span>description Filiere</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour Filiere"  >{{ $filiere->description }} </textarea>
              
              <span> Associe au departement </span>
              <input   disabled value="{{ $depa->Nom_departement }}">

                <input type="text" style="display: none" name="id" value="{{$filiere->id}}">
      
              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    

</div>
    

    
  @endsection