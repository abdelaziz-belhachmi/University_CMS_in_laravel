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
       document.getElementById('code_doti').setAttribute("style","display:none");
       document.getElementById('code_Chef').setAttribute("style","display:none");

   }else if( selectedRole == 1) {

       document.getElementById('apogee').setAttribute("style","display:none");
       document.getElementById('code_doti').setAttribute("style","");
       document.getElementById('code_Chef').setAttribute("style","display:none");


   } else {
    document.getElementById('apogee').setAttribute("style","display:none");
     document.getElementById('code_doti').setAttribute("style","display:none");
     document.getElementById('code_Chef').setAttribute("style","");

   }
   

}


  

 