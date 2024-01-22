<!-- resources/views/auth/login.blade.php -->

@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title','Login Page')
@section('content')

<link rel="stylesheet" href="css/loginStyle.css">
    <div class="ctrlogin" style="">
           
    {{--  --}}
    <div class="form-box" id="scrollbar1">
        <form id="login" class="iinput-group" method="POST" action="{{route('login')}}">
            @csrf

            <h1 class="cn">Connectez Vous</h1>
            <div class="inp">
                <img src="/images/user.png">
                <input type="text" id="email" name="email" class="input-field" placeholder="Adresse e-mail" style="height:40px;width: 88%;" required>
            </div>

            <div class="inp">
                <img src="/images/password.png">
                <input type="password" id="password" name="password" class="input-field" placeholder="Mot de Passe" style="height:40px;width: 88%; " required>
            </div>

            {{-- <input type="checkbox" class="check-box">Remember Password --}}
            <div style="width: 100%;display: flex; justify-content: center;">
                <button  style="" type="submit" class="btn"> {{ __('Login') }}</button>
            </div>
            
        </form>



        
       
    </div>
   <script>
      // For LOGIN
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  var z = document.getElementById("btn");
  var a = document.getElementById("log");
  var b = document.getElementById("reg");
  
  function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
    b.style.color = "#fff";
    a.style.color = "#000";
  }
  
  function login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
    a.style.color = "#fff";
    b.style.color = "#000";
  }


  function checkrole(){
    var selectedRole = document.getElementById('role').value;

   if( selectedRole == 0 ){

       document.getElementById('apogee').setAttribute("style","");
       document.getElementById('cne').setAttribute("style","");
       document.getElementById('code_doti').setAttribute("style","display:none");

   }else {

       document.getElementById('apogee').setAttribute("style","display:none");
       document.getElementById('cne').setAttribute("style","display:none");

       document.getElementById('code_doti').setAttribute("style","");


   } 
   

}


  

 
   </script>
    {{--  --}}
    </div>
@endsection
