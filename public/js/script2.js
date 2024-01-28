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

    
document.getElementById('apogee').setAttribute("style", "");
document.getElementById('apogee').querySelector('input').setAttribute("required", "true");

document.getElementById('code_doti').setAttribute("style", "display:none");
document.getElementById('code_doti').querySelector('input').removeAttribute("required");

document.getElementById('code_Chef').setAttribute("style", "display:none");
document.getElementById('code_Chef').querySelector('input').removeAttribute("required");

document.getElementById('departementDIV').setAttribute("style", "display:none");
document.getElementById('departementDIV').querySelector('select').removeAttribute("required");


document.getElementById('filiereDIV').setAttribute("style", "display:none");
document.getElementById('filiereDIV').querySelector('select').removeAttribute("required");

document.getElementById('modulesDIV').setAttribute("style", "display:none");
document.getElementById('modulesDIV').querySelector('select').removeAttribute("required");


   }else if( selectedRole == 1) {//prof

document.getElementById('apogee').setAttribute("style", "display:none");
document.getElementById('apogee').querySelector('input').removeAttribute("required");

document.getElementById('code_doti').setAttribute("style", "");
document.getElementById('code_doti').querySelector('input').setAttribute("required", "true");

document.getElementById('code_Chef').setAttribute("style", "display:none");
document.getElementById('code_Chef').querySelector('input').removeAttribute("required");

document.getElementById('departementDIV').setAttribute("style", "display:none");
document.getElementById('departementDIV').querySelector('select').removeAttribute("required");


document.getElementById('filiereDIV').setAttribute("style", "display:none");
document.getElementById('filiereDIV').querySelector('select').removeAttribute("required");


document.getElementById('modulesDIV').setAttribute("style", "");
document.getElementById('modulesDIV').querySelector('select').removeAttribute("required");


      }else if( selectedRole == 2) {//chef filiere

document.getElementById('apogee').setAttribute("style", "display:none");
document.getElementById('apogee').querySelector('input').removeAttribute("required");

document.getElementById('code_doti').setAttribute("style", "display:none");
document.getElementById('code_doti').querySelector('input').removeAttribute("required");

document.getElementById('code_Chef').setAttribute("style", "");
document.getElementById('code_Chef').querySelector('input').setAttribute("required", "true");

document.getElementById('departementDIV').setAttribute("style", "display:none");
document.getElementById('departementDIV').querySelector('select').removeAttribute("required");

document.getElementById('filiereDIV').setAttribute("style", "");
document.getElementById('filiereDIV').querySelector('select').setAttribute("required", "true");

document.getElementById('modulesDIV').setAttribute("style", "display:none");
document.getElementById('modulesDIV').querySelector('select').removeAttribute("required");


      }else if( selectedRole == 3) {//chef departement

document.getElementById('apogee').setAttribute("style", "display:none");
document.getElementById('apogee').querySelector('input').removeAttribute("required");

document.getElementById('code_doti').setAttribute("style", "display:none");
document.getElementById('code_doti').querySelector('input').removeAttribute("required");

document.getElementById('code_Chef').setAttribute("style", "");
document.getElementById('code_Chef').querySelector('input').setAttribute("required", "true");

document.getElementById('departementDIV').setAttribute("style", "");
document.getElementById('departementDIV').querySelector('select').setAttribute("required", "true");


document.getElementById('filiereDIV').setAttribute("style", "display:none");
document.getElementById('filiereDIV').querySelector('select').removeAttribute("required");

document.getElementById('modulesDIV').setAttribute("style", "display:none");
document.getElementById('modulesDIV').querySelector('select').removeAttribute("required");



   } else {// chef service

document.getElementById('apogee').setAttribute("style", "display:none");
document.getElementById('apogee').querySelector('input').removeAttribute("required");

document.getElementById('code_doti').setAttribute("style", "display:none");
document.getElementById('code_doti').querySelector('input').removeAttribute("required");

document.getElementById('code_Chef').setAttribute("style", "");
document.getElementById('code_Chef').querySelector('input').setAttribute("required", "true");

document.getElementById('departementDIV').setAttribute("style", "display:none");
document.getElementById('departementDIV').querySelector('select').removeAttribute("required");


document.getElementById('filiereDIV').setAttribute("style", "display:none");
document.getElementById('filiereDIV').querySelector('select').removeAttribute("required");

document.getElementById('modulesDIV').setAttribute("style", "display:none");
document.getElementById('modulesDIV').querySelector('select').removeAttribute("required");


   }
   

}


  

 