@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
{{-- <link rel="stylesheet" href="../../../../css/personnes_style.css"> --}}

<div>
    {{-- <h1 style="color: black">
        aaaaaaa
    </h1> --}}
    {{-- <div style="display: flex;justify-content:end;">

        <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Departemet</button>
    </div> --}}
    <section id="contact">
        <div class="content">
          <div id="form">
            <form action="/Auth/edit/dep" id="contactForm" method="post">
              @csrf
              <span>Code Departement</span>
              <input type="text" name="code" class="code" placeholder="Enter l'object" value="{{$de->Code_departement}}" />
              
              <span>Nom Departement</span>
              <input type="text" name="nom" class="nom" placeholder="Enter l'object" value="{{$de->Nom_departement}}" />
              
              
              <span>description</span>
              <textarea class="desc"  name="desc" style="color: black" placeholder="Entez description pour departement"  >{{ $de->description }} </textarea>
              
              
                <input type="text" style="display: none" name="id" value="{{$de->id}}">
      
              <input type="submit" name="submit" value="submit" class="submit" >
      
            </form>
          </div>
      </section>
    

</div>
    
    
    
    
    {{-- <script src="../../../../js/auth_home.js"></script> --}}
    
  @endsection