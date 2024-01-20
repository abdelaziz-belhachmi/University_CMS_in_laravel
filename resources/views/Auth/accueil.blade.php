@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../css/auth_home.css">

<article class="larg">
@foreach ($annonces as $annoce)
<div>
  <h3> {{$annoce->name }}<span class="entypo-down-open"></span></h3>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus iste quia incidunt ad provident ullam quo assumenda expedita quae sapiente ipsa qui esse similique! Modi obcaecati natus sapiente quaerat omnis.</p>
</div>
@endforeach
   

  </article>
<script src="../../js/auth_home.js"></script>


  @endsection