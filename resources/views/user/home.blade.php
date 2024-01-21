@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' espace etudiant')
@section('content')

<div style="min-height: 80vh">

  <h1>Welcome User, {{ Auth::user()->name}}
  </h1>
</div>

@endsection
