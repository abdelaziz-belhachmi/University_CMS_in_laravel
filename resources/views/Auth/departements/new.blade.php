@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/new/dep" id="contactForm" method="post">
              @csrf
              <span>Code Departement</span>
              <input type="text" name="code" class="code" placeholder="Enter l'object"  />
              
              <span>Nom Departement</span>
              <input type="text" name="nom" class="nom" placeholder="Enter l'object"  />
              
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour departement" ></textarea>
              
              
      
      
              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    

</div>
    
  @endsection