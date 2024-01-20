@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">

<section id="contact">
    <div class="content">
      <div id="form">
        <form action="/Auth/home/annonce/cree_annonce" id="contactForm" method="post">
          @csrf
          <span>Object</span>
          <input type="text" name="object" class="object" placeholder="Enter l'object"  />
          
          <span>Message</span>
          <textarea class="message"  name="message" placeholder="Enter your message" ></textarea>
          
          <label>Audience</label>
            <div style="padding 10px;min-height: 10px">
              <label><input  type="checkbox" name="Visiteurs" value="Visiteurs"> Visiteurs</label><br /><br>
              <label><input  type="checkbox" name="Etudiant" value="Etudiant"> Etudiants</label><br /><br>
              <label><input  type="checkbox" name="Proffesseur" value="Proffesseur"> Proffesseur</label><br /><br>
              <label><input  type="checkbox" name="Chef_Filiere" value="Chef_Filiere"> Chef Filiere</label><br /><br>
              <label><input  type="checkbox" name="Chef_Departement" value="Chef_Departement"> Chef Departement</label><br /><br>
              <label><input  type="checkbox" name="Chef_Service" value="Chef_Service"> Chef Service</label><br /><br>
            </div>
  
  
          <input type="submit" name="submit" value="submit" class="submit" >
  
        </form>
      </div>
  </section>

<script src="../../../js/auth_home.js"></script>


  @endsection