@extends('auth.home') 
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/edit/dep" id="contactForm" method="post">
              @csrf
              <span>Code Departement</span>
              <input type="text" name="code" class="code" placeholder="Enter l'object" value="{{$de->Code_departement}}" />
              
              <span>Nom Departement</span>
              <input type="text" name="nom" class="nom" placeholder="Enter l'object" value="{{$de->Nom_departement}}" />
              
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour departement"  >{{ $de->description }} </textarea>
              
              
                <input type="text" style="display: none" name="id" value="{{$de->id}}">
      
              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    

</div>
    

    
  @endsection