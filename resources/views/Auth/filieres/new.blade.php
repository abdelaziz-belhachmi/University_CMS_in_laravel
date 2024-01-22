@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/filiers/new" id="contactForm" method="post">
              @csrf
              <span>Code Filiere</span>
              <input type="text" name="code" class="code" placeholder="Enter l'object" required />
              
              <span>Nom Filiere</span>
              <input type="text" name="nom" class="nom" placeholder="Enter l'object" required />
              
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour la Filiere" required ></textarea>
              
              <div id="departementDIV" style="">
                <label for="dep">Assosiver avec Depratement :</label>
                <select style="height: 45px;margin:15px" id="dep" name="dep" onclick="" required> 
                <option disabled selected value> -- select a Depratement -- </option>
                @foreach ($All_departements as $a_departement)
                  <option value="{{$a_departement->id}}">{{$a_departement->Nom_departement}}</option>
                @endforeach  
                  
                </select>

                @if(sizeof($All_departements) == 0 )
                <p style="color: red">il y a aucun departement <br> il faut avoir un departement avant associer une filiere </p>
                @endif
              </div> 
      
              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    
      <script>

      </script>

</div>
    
  @endsection