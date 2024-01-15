@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' dashboard')
@section('content')

   <h1>welcome to Auth , {{ Auth::user()->name}}</h1>

@endsection
