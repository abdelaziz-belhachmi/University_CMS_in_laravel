@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/modules/nouveau" id="contactForm" method="post">
              @csrf
              <span>Code Module</span>
              <input type="text" name="code" class="code" placeholder="Entrer le code du module" required />
              
              <span>Nom Module</span>
              <input type="text" name="nom" class="nom" placeholder="Entrer le nom du module" required />
              
             
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour la Module" required ></textarea>
               
              <span>Semestre</span>
              <select name="semestre" id="semestre" required>
                <option disabled selected value> -- select a semestre -- </option>
                <option value="1">1ere semestre</option>
                <option value="2">2eme semestre</option>

              </select>

              <input type="text" style="display: none" name="filiere_id" value="{{$id}}"> 
              <input type="submit" name="submit" value="Ajouter" class="submit" >
      
            </form>
          </div>
      </section>
    
      <script>

      </script>

</div>
    
  @endsection