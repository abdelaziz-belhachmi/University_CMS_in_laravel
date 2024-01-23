@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Register A user')
@section('content')

<link rel="stylesheet" href="../../css/register.css"> 


   <br>
  
   <link rel="stylesheet" href="../css/auth_home.css">

   <div style="margin-top:4vh;display:flex; justify-content:center">

    <form  style="width:45vw;" method="POST" action="{{url('/Auth/register')}}">
        <div  class="crrr" >
            @csrf
         
            <label for="role">Role:</label>
            
            <select style="height: 45px;margin:10px" id="role" name="role" onclick="checkrole()"> 
            <option value="0">Étudiant</option>
            <option value="1">Professeur</option>
            <option value="2">Chef filière</option>
            <option value="3"> Chef département</option>
            <option value="4">Chef service</option>
            </select>

            <div id="filiereDIV" style="display: none">
              <label for="dep">Associer avec Filiere :</label>
              <select style="height: 45px;margin:15px" id="filiere" name="filiere" onclick="" > 
                <option disabled selected value> -- select a filiere -- </option>

              @foreach ($filieresLibres as $filieresLibre)
              <option value="{{$filieresLibre->id}}">{{$filieresLibre->Nom_filliere}}</option>
              @endforeach  
              
            
              
            </select>
            @if(sizeof($filieresLibres) == 0 )
            <p style="color: red">aucune filiere libre <br> il faut cree une filiere avant associer Chef au filiere </p>
            @endif
            </div>

          <div id="departementDIV" style="display: none">
            <label for="dep">Assosiver avec Depratement :</label>
            <select style="height: 45px;margin:15px" id="dep" name="dep" onclick="" > 
              <option disabled selected value> -- select a Depratement -- </option>

            @foreach ($departementsLibres as $departementsLibre)
            <option value="{{$departementsLibre->id}}">{{$departementsLibre->Nom_departement}}</option>
            @endforeach  
              
            </select>
            @if(sizeof($departementsLibres) == 0 )
            <p style="color: red">aucune Depratement libre <br> il faut avoir au mois un departement libre avant lui associer un Chef  </p>
            @endif
          </div>
    
            <div>
                <input type="text" class="input-field" name="first_name" required="required" placeholder="Nom" value="" >
                <input type="text" class="input-field" name="last_name" required="required"  placeholder="Prenom" value="">
            </div>
    
    
        <div>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email"  value="" required >
        </div>
      <div>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="psw"  value="" required>
        </div>
    
        <div>
            <label for="dob">Date de naissance:</label>
            <input type="date" id="dob" name="birthdate" value="" required>
        </div>
    <input type="text" class="input-field" id="apogee" name="apogee"  placeholder="Code apogée"  >
    
    <input type="text" class="input-field" id="code_doti" name="code_doti" placeholder="Code Doti" style="display: none" >
  
    <input type="text" class="input-field" id="code_Chef" name="code_Chef" placeholder="Code Chef" style="display: none" >


    <input type="text" class="input-field" name="cin" placeholder="CIN" required="required" value="">
    <input type="text" class="input-field" name="phone" placeholder="Telephone" required="required" value="">
    <input type="text" class="input-field" name="address" placeholder="Adresse" required="required" value="">
    <input type="text" class="input-field" name="city" placeholder="Ville" required="required" value="">
    <input type="text" class="input-field" name="zip" placeholder="code zip" required="required" value="">
             
      
          <button type="submit" class="registerbtn">Register</button>
        </div>
        
       
      </form>
    
    </div>

    <script src="../js/script2.js"></script>

@endsection
