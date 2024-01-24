@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">

<div>
  
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/local/new" id="contactForm" method="post">
              @csrf
              <span>Code Sale</span>
              <input type="text" name="code_local" class="code_local" placeholder="Enter l'object" required />
              
              <span>Nom Sale</span>
              <input type="text" name="nom_local" class="nom_local" placeholder="Enter l'object" required />
              
              <select style="height: 45px;margin:15px" id="loc_type" name="loc_type" onclick="" required> 
                <option disabled selected value> -- Select un Type -- </option>
                <option value="salle conference">salle conference</option>  
                <option value="salle">salle</option>
                <option value="amphi">amphi</option>
              </select>   
             
              <div id="departementDIV" style="">
                <label for="dep">Assosiver avec Depratement :</label>
                <select style="height: 45px;margin:15px" id="dep" name="dep" onclick="" required> 
                <option disabled selected value> -- select une Depratement -- </option>
                @foreach ($All_departements as $a_departement)
                  <option value="{{$a_departement->id}}">{{$a_departement->Nom_departement}}</option>
                @endforeach  
                  
                </select>

                @if(sizeof($All_departements) == 0 )
                <p style="color: red">il y a aucun departement <br> il faut avoir un departement avant associer un local </p>
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