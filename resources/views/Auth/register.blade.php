@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Register A user')
@section('content')

{{-- @extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent') --}}

{{-- <link rel="stylesheet" href="../../css/auth_home.css">--}}
<link rel="stylesheet" href="../../css/register.css"> 


   <br>
   {{-- <link rel="stylesheet" href="../css/loginStyle.css"> --}}
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

            <label for="dep">Assosiver avec Depratement :</label>
            <select style="height: 45px;margin:10px" id="dep" name="dep" onclick=""> 
            
            @foreach ($collection as $item)
            <option value="{{$item->id}}">{{$item->Nom_departement}}</option>
            {{-- AAAAAAAAAAAAAAAAAA  hna khassni n afficher list of available departements that doesnt have chef yet, you should do same to filier --}}
            @endforeach  
              
            </select>
    
    
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
