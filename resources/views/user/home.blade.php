@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' dashboard')
@section('content')
<link rel="stylesheet" href="../css/auth_home.css">
   {{-- <span class="bckg"></span> --}}
   <div style="display: flex">

<header style="background-color:white;height:auto;min-height:80vh;">
  {{-- <h1 id="acc" style="justify-content: center;align-content:center;display:flex;background-color:white"></h1> --}}
  <nav style="">
    <ul>
    
      <li>
        <a  href="{{route('user.accueil')}}">Accueil</a>
      </li>
    
      <li>
        <a  href="{{route('user.profil')}}">Mon profil</a>
      </li>
    
      <li>
        <a href="{{route('user.demande')}}" data-title="Annonces">Faire une demande</a>
      </li>

      <li>
         <a href="{{url('logout')}}" data-title="Logout">Se deconnecter</a>
      </li>
    
    </ul>


  </nav>
</header>

<main style="float: right;background-color:white">

 

  @yield('contents')

</main>


</div>



@endsection

  