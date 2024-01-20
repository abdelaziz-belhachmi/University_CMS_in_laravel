@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Register A user')
@section('content')

  
   <br>
   <link rel="stylesheet" href="../css/loginStyle.css">

   {{-- <link rel="stylesheet" href="../css/style.css"> --}}
{{--    

 <!-- Registration Form -->
        <form id="register" class="input-group">
            
            <input type="text" class="input-field" placeholder=" Prenom" required="required">
            <input type="text" class="input-field" placeholder=" Nom" required="required">
            <br>
            <br>
            <label for="role">Role:</label>
<select id="role" onclick="checkrole()"> 
<option value="0">
    Étudiant
</option>
<option value="1">Professeur</option>
<option value="2">Chef filière</option>
<option value="3"> Chef département</option>
<option value="4">Chef service</option>
</select>
            <input type="email" class="input-field" placeholder="Adresse e-mail" required="required">
            <input type="password" class="input-field" placeholder="Creer mot de passe" name="psame" required="required">
            <input type="password" class="input-field" placeholder="Confirmer mot de passe" name="psame" required="required">
            <br>
            <br>
            <label for="dob">Date de naissance:</label>
<input type="date" id="dob" name="dob" required>
<input type="text" class="input-field" id="apogee"  placeholder="Code apogée" required="required">
<input type="text" class="input-field" id="cne" placeholder=" CNE" required="required">
<input type="text" class="input-field" id="code_doti" placeholder="Code Doti"  required="required">

<input type="text" class="input-field" placeholder="CIN" required="required">
<input type="text" class="input-field" placeholder="Telephone" required="required">
<input type="text" class="input-field" placeholder="Adresse" required="required">
<input type="text" class="input-field" placeholder="Ville" required="required">
<input type="text" class="input-field" placeholder="Pays" required="required">
<input type="text" class="input-field" placeholder="code zip" required="required">

            <button type="submit" id="btnSubmit" class="submit-btn reg-btn">Register</button>
        </form>


    --}}


<div class="container">
   {{-- <div class="scrollbar" > --}}

    {{-- <form action="{{route('register')}}" method="post" style="width: 40vw;"  id="contact_form">
        @csrf
        <fieldset>

            <!-- Form Name -->
            <legend><b>Register A user!</b></legend>
            <br>

            <!-- Text input-->

            <div>
                <label>First Name</label>  
                <div>
                    <input  name="first_name" placeholder="First Name" type="text" required>
                </div>
            </div>

            <!-- Text input-->

            <div>
                <label>Last Name</label> 
                <div>
                    <input name="last_name" placeholder="Last Name" type="text" required>
                </div>
            </div>

            <div>
                <label for="role">Role</label>
                <select id="role" name="role" onclick="checkrole()">
                    <option value="0">Etudiant</option>
                    <option value="1">Prof</option>
                    <option value="2">Chef filiere</option>
                    <option value="3">Chef Departement</option>
                    <option value="4">Chef Service</option>
                </select>    
            </div>
                
            <!-- Text input-->
            <div>
                <label>E-Mail</label>  
                <div>
                    <input name="email" placeholder="E-Mail Address" type="text" required>
                </div>
            </div>

            <div>
                <label>Password</label>  
                <div>
                    <input name="password" placeholder="password" type="password" required>
                </div>
            </div>

            <div>
                <label for="birthdate">Date of Birth:</label>
                <div>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
            </div>

           
            <div id="apogee" >
                <label>Code Apogee</label>  
                <div>
                    <input name="apogee" placeholder="655512120" type="text" >
                </div>
            </div>

            <div id="code_doti" style="display: none" >
                <label>Code DOTI</label>  
                <div>
                    <input name="code_doti" placeholder="A55512120" type="text" >
                </div>
            </div>

            <div id="cin" style="" >
                <label>CIN</label>  
                <div>
                    <input name="cin" placeholder="A112233" type="text" required>
                </div>
            </div>
            <!-- Text input-->

            <div>
                <label>Phone #</label>  
                <div>
                    <input name="phone" placeholder="+212655512120" type="text" required>
                </div>
            </div>


            <!-- Text input-->

            <div>
                <label>Address</label>  
                <div>
                    <input name="address" placeholder="Address" type="text"> 
                </div>
            </div>

            <!-- Text input-->

            <div>
                <label>City</label>  
                <div>
                    <input name="city" placeholder="city"  type="text">
                </div>
            </div>

            <!-- Text input-->

            <div>
                <label>Zip Code</label>  
                <div>
                    <input name="zip" placeholder="Zip Code"  type="text">
                </div>
            </div>


            <!-- Button -->
            <div style="padding:10px" >
                <button style="padding: 10px;color:aliceblue;width:100%;background-color:#343434;font-size:18px" type="submit">Register</button>
            </div>

        </fieldset>
    </form> --}}

    {{--  --}}

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
{{-- </div> --}}
    {{-- <script>

        function checkrole(){
         var selectedRole = document.getElementById('role').value;
            console.log(selectedRole);
        if( selectedRole == 0 ){

            document.getElementById('apogee').setAttribute("style","");
            document.getElementById('code_doti').setAttribute("style","display:none");

        }else {

            document.getElementById('code_doti').setAttribute("style","");
            document.getElementById('apogee').setAttribute("style","display:none");


        } 
        

    }
    </script> --}}

    <script src="../js/script2.js"></script>

@endsection
