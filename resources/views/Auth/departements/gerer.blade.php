@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel =" stylesheet" href ="../../../../css/styleDep.css">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Departemet</button>
 </div>
<div style="justify-content:center;">


        <main>
    
        <section class="section departements" 
        
        id="departements">
    
            <div class="wrapper">
    
                <h1 class="section__title"></h1>
    
                <p class="section__solg" >
              
                  DÉPARTEMENTS
                </p>
                <div
                    class="three-columns section-content departements-wrapper"
                >
                    <div class="departement-card">
                       
                            <img src="/images/imagesdep/genieinfo.jpg"
                            class="departement__img">
                            <div class="departement-infos">
                                <h3>GÉNIE INFORMATIQUE
                                </h3>
                                <p>
                                    
                                    Chef : Pr.EL BRAK Mohamed<p></p>
                                    Email : melbrak@uae.ac.ma
    
    
                                </p>
                            </div>
                      
                    </div>
        
                    <div class="departement-card">
                     
                            <img src="/images/imagesdep/scienceterre.jpg" 
                            class="departement__img">
    
                            <div class="departement-infos">
    
                                <h3> SCIENCES DE LA TERRE</h3>
                                <p>
                                    
                                   Chef : Pr.BOULAASSAL Hakim<p></p>
                                   Email : h.boulaassal@uae.ac.ma
    
    
                                </p>
                            </div>
                    
                    </div>
                    <div class="departement-card">
    
                  
                        <img src="/images/imagesdep/geniechimique.jpg" 
                        
                        class="departement__img">
                            
                        <div class="departement-infos">
                            <h3>GÉNIE CHIMIQUE
                            </h3>
                            <p>
                                Chef : Pr.CHABBI Mohamed</p><p>
                                Email : mchabbi@uae.ac.ma
                            </p>
                        </div>
              
                    </div>
                    <div class="departement-card">
    
                      
                            <img src="/images/imagesdep/geniemecanique.jpg" 
                            
                            class="departement__img">
                                
                            <div class="departement-infos">
                                <h3>GÉNIE MÉCANIQUE
                                </h3>
                                <p>
    
    
                                    Chef : Pr.ELAYACHI Ilham</p><p>
                                        Email : i.elayachi@uae.ac.ma
    
                                </p>
                            </div>
                
                        </div>
                        <div class="departement-card">
    
                  
                                <img src="/images/imagesdep/math.jpg" 
                                
                                class="departement__img">
                                    
                                <div class="departement-infos">
                                    <h3>MATHÉMATIQUES
    
                                    </h3>
                                    <p>
    
                                        Chef : Pr.EL HALIMI RACHID<p></p>
                                        Email : r.elhalimi@uae.ac.ma</p><p>
    
                                            
                                    </p>
                                </div>
                    
                            </div>
                            <div class="departement-card">
    
                       
                                    <img src="/images/imagesdep/sciencevie.jpg" 
                                    
                                    class="departement__img">
                                        
                                    <div class="departement-infos">
    
                                        <h3>SCIENCES DE LA VIE
    
        
                                        </h3>
                                        <p>
                                            Chef : Pr.HASSANI ZERROUK Mounir<p></p>
                                            Email : mhassani@uae.ac.ma</p><p>
        
                                                
                                        </p>
                                    </div>
                         
                                </div>
                </div>
                </div>
        </section>
        
    </div>
    
    
    <script>
        function s(id) {
            window.location.href='/Auth/departements/delete/'+id;

        }
        function e(id){
            window.location.href='/Auth/departements/edit/'+id;

        }
        function make(){
            window.location.href='/Auth/departements/new';
        }
    </script>
    
  
  @endsection