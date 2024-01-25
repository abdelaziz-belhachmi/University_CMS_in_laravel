@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/module/modifier" id="contactForm" method="post">
              @csrf
              <span>Code Module</span>
              <input type="text" name="code" class="code" placeholder="Entrer le code du module" value="{{$mod->code_module}}" required />
              
              <span>Nom Module</span>
              <input type="text" name="nom" class="nom" placeholder="Entrer le nom du module" value="{{$mod->nom_module}}" required />
              
             
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour la Module" required >{{$mod->description_module}}</textarea>
               
              <span>Semestre</span>
              <select name="semestre" id="semestre" required>
                {{-- <option disabled selected value> -- select a semestre -- </option> --}}
                @if ($mod->semestre == 1)
                <option value="1" selected>1ere semestre</option>
                <option value="2">2eme semestre</option>
                @else
                <option value="1" >1ere semestre</option>
                <option value="2" selected>2eme semestre</option>
                @endif

              </select>

              <input type="text" style="display: none" name="id" value="{{$id}}"> 
              <input type="submit" name="submit" value="Ajouter" class="submit" >
      
            </form>
          </div>
      </section>
    
      <script>

      </script>

</div>
    
  @endsection