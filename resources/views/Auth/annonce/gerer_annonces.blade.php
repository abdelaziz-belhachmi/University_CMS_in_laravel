@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">

{{-- <h1>afficher ici dashboard de curd annonces</h1> --}}
<div style="background-color:#000;height:80px ; display:flex;justify-content:end">
  <button class='button -dark ' style="margin:10px;" onclick="cree();">Cree Une annonce</button>
  {{-- <button class='button -dark ' style="margin:10px" onclick="modifier();">Modifer Une annonce</button> --}}
</div>

<article class="larg">

@foreach ($annonces as $annonce)
<div>
  <h3> {{ $annonce->titre }}<span class="entypo-down-open"></span></h3>
  {{-- <></label> --}}
  <h6 style="padding: 0px; margin:0px;display: none" id="date_cre" for="auteur" >Cree Le :{{ $annonce->date_creation  }}</h6>
  <h6 style="padding: 0px; margin:0px;display: none" id="auteur" name="auteur">Auteur : moi</h6>
  <p>{{ $annonce->description }}</p>
  <div style="border:none;display: flex;justify-content:end">

    <a class="button -black" href="{{ url('Auth/modifier_annonce/'.$annonce->id ) }}">Modifer</a>
    <a class="button -black"  href="{{ url('Auth/supprimer_annonce/'.$annonce->id ) }}">Supprimer</a>
    
  </div>
</div>
@endforeach
</article>


{{-- <div >Touch me</div> --}}


<script src="../../../js/auth_home.js">
</script>


  @endsection