@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../css/auth_home.css">

<article class="larg">
@foreach ($annonces as $annoce)
<div>
  <h3> {{ $annoce->titre }}<span class="entypo-down-open"></span></h3>
  <p>{{ $annoce->description }}</p>
</div>
@endforeach
   

  </article>
<script src="../../js/auth_home.js"></script>


  @endsection