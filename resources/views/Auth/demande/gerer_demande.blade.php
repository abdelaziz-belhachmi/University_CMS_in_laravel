@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">

{{-- <h1>afficher ici dashboard de crud demandes</h1> --}}
<div  style="background-color:#d8d8d8;height:80px ; display:flex;justify-content:end">

    <a class="button -black" href="{{ route('user.demande') }}">Faire une Demande</a>
  {{-- <button class='button -dark ' style="margin:11px;" onclick="cree();">Creer Une Demande</button> --}}
  {{-- <button class='button -dark ' style="margin:10px" onclick="modifier();">Modifer Une demande</button> --}}

</div>

<article class="larg">

@foreach ($demandes as $demande)
<div>
  <h3> {{ $demande->type }}<span class="entypo-down-open"></span></h3>
  {{-- <></label> --}}
  <h6 style="padding: 0px; margin:0px;display: none" id="date_cre" for="auteur" >Cree Le :{{ $demande->created_at  }}</h6>
  <h6 style="padding: 0px; margin:0px;display: none" id="auteur" name="auteur">Auteur : moi</h6>
  <p>{{ $demande->description }}</p>
  <div style="border:none;display: flex;justify-content:end">

    <a class="button -black" href="{{ url('Auth/modifier_demande/'.$demande->id ) }}">Modifer</a>
    <a class="button -black"  href="{{ url('Auth/supprimer_demande/'.$demande->id ) }}">Supprimer</a>
    
  </div>
</div>
@endforeach
</article>


{{-- <div >Touch me</div> --}}


<script src="../../../js/auth_home.js">
</script>


  @endsection