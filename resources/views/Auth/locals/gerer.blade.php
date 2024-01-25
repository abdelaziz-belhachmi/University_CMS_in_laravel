@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleloc.css">
<style>
/* The Modal (background) */
.modal {
  display: none; 
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  padding-left: 100px; /* Location of the box */
  
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #70e09f;
  width: 60%;
  /* height: 40% */
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.btnDep{
    background-color: #70e09f;
    color:white;
    font-weight: 600;
    font-size: 20px;
    padding: 15px;
    border:none;
    border-radius: 5px;
    opacity: 0.8;
    margin: 30px
}
.btnDep:hover{
    opacity: 1;
}
</style>
{{--  --}}
 <div style="display: flex;justify-content:end;">
     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel local</button>
 </div>
{{--  --}}
<div style="justify-content:center;">
{{--  --}}
@if(Auth::user()->role == 4)
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div style="display: flex;justify-content:center">

      @foreach($departements as $dep)    
      <button  onclick="associer('{{$dep->id}}')" class="btnDep" >Departement : {{$dep->Nom_departement}}</a>
      @endforeach
         </div>

    </div>
  
  </div>
  @endif
{{--  --}}    
        <section class="section locals" id="locals">
            <div class="wrapper">
                <h1 class="section__title"></h1>
                <p class="section__solg" >LOCAUX</p>
                <div class="three-columns section-content locals-wrapper" >
                  
            @foreach ($locaux as $local)
                    @if(Auth::user()->role == 3)    
                @if($local->departement  && 
                $local->departement->chefDepartement &&
                 $local->departement->chefDepartement->id ==  Auth::user()->Chef_Departement->id)

                    <div class="local-card">
                            <img src="/images/imagesdep/dep_img.png" class="local__img">
                            <div class="local-infos">
                                
                                <h3>Nom Local :{{$local->Nom_local}}</h3>

                                <p>Code local :{{$local->Code_local}}</p>

                                <p>Departement :{{$local->departement->Nom_departement}}</p>
                               

                                <div id="bouttons-crud" >
                                  <button onclick="e('{{$local->id}}')" style="background-color: #70a3e0">Gerer materiaux</button>
                                  <button onclick="s('{{$local->id}}')" style="background-color:rgb(201, 39, 72)">Supprimer</button>
                                </div>

                            </div>
                    </div>
                @endif
                @endif

                @if(!$local->departement && Auth::user()->role == 4)
                <div class="local-card">
                    <img src="/images/imagesdep/dep_img.png" class="local__img">
                    <div class="local-infos">
                        
                        <h3>Nom Local :{{$local->Nom_local}}</h3>

                        <p>Code local :{{$local->Code_local}}</p>

                        <p>Departement :Sans</p>
                       
                        
                        <div id="bouttons-crud" >
                            <button onclick="cl('{{$local->id}}')" style="background-color: #70e0ae;font-size:14px">associer a Departement</button>
                          <button onclick="e('{{$local->id}}')" style="background-color: #70a3e0;font-size:14px">Gerer materiaux</button>
                          <button onclick="s('{{$local->id}}')" style="background-color:rgb(201, 39, 72);font-size:14px">Supprimer</button>
                        </div>

                    </div>
                </div>

                @endif
            @endforeach


                </div>
                </div>
        </section>
        
    </div>
    
    
    <script>

   // Get the modal
   var modal = document.getElementById("myModal");
        
        // Get the button that opens the modal
        var btn = document.getElementsByClassName("associer");

        var localID ;
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        
        function associer(idDep) {
            window.location.href='/Auth/local/associer/'+localID+'/'+idDep;
        }

        function s(id) {
            alert('are you sure');
            window.location.href='/Auth/local/delete/'+id;

        }
        function e(id){
            window.location.href='/local/gerer/materiaux/'+id;

        }
        function make(){
            window.location.href='/Auth/local/new';
        }
   
     
        // When the user clicks the button, open the modal 
      
        function cl(loc) {
          modal.style.display = "block";
          localID = loc;
        }
       
       
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>
  
  @endsection