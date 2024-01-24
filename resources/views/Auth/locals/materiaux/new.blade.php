@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
{{-- <link rel="stylesheet" href="../../../../css/auth_home.css"> --}}

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/materiel/new" id="contactForm" method="post">
              @csrf
              <span>Nom Materiel</span>
              <input type="text" name="nom_materiel" class="code" placeholder="Enter l'object"  />
              
              <span>categorie materiel</span>
              <input type="text" name="categorie_materiel" class="nom" placeholder="Enter l'object"  />
                
              <span>Etat Materiel</span>
              <select name="etat" >
                <option value="fonctionnel">fonctionnel</option>
                <option value="en panne">en panne</option>
              </select>
               
              {{-- <span>categorie materiel</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entezcategorie materiel" ></textarea>
               --}}


              <input type="text" style="display: none" name="local_id" value="{{$id}}">

              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    

</div>
    
  @endsection