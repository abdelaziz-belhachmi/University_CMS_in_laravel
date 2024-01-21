@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Register A user')
@section('content')

  
   <br>
   <link rel="stylesheet" href="../css/loginStyle.css">
   <link rel="stylesheet" href="../css/auth_home.css">

<div class="container">

    <form action="{{route('register')}}" method="post" id="register" class="input-group">
            @csrf
            <input type="text" class="input-field"    name="first_name" placeholder=" Nom" required="required">
            <input type="text" class="input-field" name="last_name" placeholder=" Prenom" required="required">
        <br>
        <br>
        <label for="role">Role:</label>
<select id="role" name="role" onclick="checkrole()"> 
<option value="0">Étudiant</option>
<option value="1">Professeur</option>
<option value="2">Chef filière</option>
<option value="3"> Chef département</option>
<option value="4">Chef service</option>
</select>
        <input type="email" class="input-field" placeholder="Adresse e-mail" name="email" required="required">
        <input type="password" class="input-field" placeholder="Creer mot de passe" name="password" required="required">
        <br>
        <br>
        <label for="dob">Date de naissance:</label>
<input type="date" id="dob" name="birthdate" required>

<input type="text" class="input-field" id="apogee" name="apogee"  placeholder="Code apogée" >
{{-- <input type="text" class="input-field" id="cne" name="cne" placeholder=" CNE" style="display: none"> --}}
<input type="text" class="input-field" id="code_doti" name="code_doti" placeholder="Code Doti"  style="display: none">

<input type="text" class="input-field" name="cin" placeholder="CIN" required="required">
<input type="text" class="input-field" name="phone" placeholder="Telephone" required="required">
<input type="text" class="input-field" name="address" placeholder="Adresse" required="required">
<input type="text" class="input-field" name="city" placeholder="Ville" required="required">
{{-- <input type="text" class="input-field" name="contry" placeholder="Pays" required="required"> --}}
<input type="text" class="input-field" name="zip" placeholder="code zip" required="required">

        <button type="submit" id="btnSubmit"  class="submit-btn reg-btn">Register</button>
    </form>

{{--  --}}
</div>


    <script src="../js/script2.js"></script>

@endsection
