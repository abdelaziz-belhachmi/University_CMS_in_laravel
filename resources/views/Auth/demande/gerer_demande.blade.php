@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">

{{-- <h1>afficher ici dashboard de crud demandes</h1> --}}
<div  style="background-color:#d8d8d8;height:80px ; display:flex;justify-content:end">

    <a class="button-blacke" href="{{ route('user.demande') }}"> 👨🏻‍💻Faire une Demande 👩‍💻</a>
    
  {{-- <button class='button -dark ' style="margin:11px;" onclick="cree();">Creer Une Demande</button> --}}
  {{-- <button class='button -dark ' style="margin:10px" onclick="modifier();">Modifer Une demande</button> --}}

</div>

<article class="larg">

@foreach ($demandes as $demande)
<div>
  <h3> {{ $demande->type }}<span class="entypo-down-open"></span></h3>
  {{-- <></label> --}}
  <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur" >Type de Document :{{ $demande->type  }}</h6>
  <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur" >Faite Le :{{ $demande->created_at  }}</h6>
  <h6 style="padding: 0px; margin:0px;display: block" id="auteur" name="auteur">Etudiant(e) : {{ $demande->user_id  }} </h6>
  <p>{{ $demande->description }}</p>
  <div style="border:none;display: flex;justify-content:end">

    {{-- <a class="button-blackes" href="{{ url('Auth/modifier_demande/'.$demande->id ) }}">📝 Modifer</a> --}}
    {{-- <a class="button-blackes"  href="{{ url('Auth/supprimer_demande/'.$demande->id ) }}">🚮 Supprimer</a> --}}
 
    <form action="{{ route('demandes.destroy', $demande->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="button-blackes">🚮 Supprimer</button>
      </form>
    
  </div>
</div>

@if(session('message'))
<div style="background-color: red; color: white; padding: 10px; text-align: center; border-radius: 5px;">
    {{ session('message') }}
</div>
@endif

@endforeach


</article>


{{-- <div >Touch me</div> --}}


<script src="../../../js/auth_home.js">
</script>


  @endsection