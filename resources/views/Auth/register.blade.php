@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Register A user')
@section('content')

  
   <br>
   
   <div class="centered-div" style="width: 100vw;align-items: center;justify-content: center;display:flex">

    <form action="{{route('register')}}" method="post" style="width: 40vw;"  id="contact_form">
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
    </form>
</div>
    <script>

        function checkrole(){
         var selectedRole = document.getElementById('role').value;

        if( selectedRole == 0 ){

            document.getElementById('apogee').setAttribute("style","");
            document.getElementById('code_doti').setAttribute("style","display:none");

        }else {

            document.getElementById('apogee').setAttribute("style","display:none");
            document.getElementById('code_doti').setAttribute("style","");


        } 
        

    }
    </script>


@endsection
