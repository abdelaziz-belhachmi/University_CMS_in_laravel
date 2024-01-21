@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../css/auth_home.css">
<link rel="stylesheet" href="../../css/register.css">

<div style="margin-top:4vh;display:flex; justify-content:center">

<form  style="width:45vw;" method="POST" action="{{route('update_user_info')}}">
    <div  class="crrr" >
        @csrf
     
        {{-- <label for="role">Role:</label>
        <select style="height: 45px;margin:10px" id="role" name="role" onclick="checkrole()"> 
        <option value="0">Étudiant</option>
        <option value="1">Professeur</option>
        <option value="2">Chef filière</option>
        <option value="3"> Chef département</option>
        <option value="4">Chef service</option>
        </select> --}}


        <div>
            <input type="text" class="input-field" name="first_name" required="required" value="{{$details->user->name}}" >
            <input type="text" class="input-field" name="last_name" required="required"  value="{{$details->user->prenom}}">
        </div>


    <div>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email"  value="{{$details->user->email}}" required disabled>
    </div>
  <div>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="psw"  value="" required>
    </div>

    <div>
        <label for="dob">Date de naissance:</label>
        <input type="date" id="dob" name="birthdate" value="{{$details->user->date_naissance}}" required>
    </div>
@if ($prole === 0)
<input type="text" class="input-field" id="apogee" name="apogee"  placeholder="Code apogée" value="{{$details->user->etudiant->code_apogee}}" >
@endif 

@if($prole === 1)
<input type="text" class="input-field" id="code_doti" name="code_doti" placeholder="Code Doti" value="{{$details->user->professeur->code_doti}}">
@endif
<input type="text" class="input-field" name="cin" placeholder="CIN" required="required" value="{{$details->user->cin}}">
<input type="text" class="input-field" name="phone" placeholder="Telephone" required="required" value="{{$details->user->numero_telephone}}">
<input type="text" class="input-field" name="address" placeholder="Adresse" required="required" value="{{$details->user->adresse}}">
<input type="text" class="input-field" name="city" placeholder="Ville" required="required" value="{{$details->user->ville}}">
<input type="text" class="input-field" name="zip" placeholder="code zip" required="required" value="{{$details->user->code_postale}}">
<input type="text" id="id" name="id" style="display: none;" value='{{ $details->user->id }}' >
         
  
      <button type="submit" class="registerbtn">Update</button>
    </div>
    
   
  </form>

</div>

<script src="../../js/auth_home.js"></script>


  @endsection