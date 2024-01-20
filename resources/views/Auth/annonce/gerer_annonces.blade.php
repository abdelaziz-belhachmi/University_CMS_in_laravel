@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../css/auth_home.css">

<h1>afficher ici dashboard de curd annonces</h1>
<a href="{{route('Auth.annonce.cree_annonce')}}">Cree ici annonces</a>

<script src="../../../js/auth_home.js"></script>


  @endsection