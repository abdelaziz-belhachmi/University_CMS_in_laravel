@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' dashboard')
@section('content')

<link rel="stylesheet" href="../css/auth_home.css">
   {{-- <span class="bckg"></span> --}}
   <div style="display: flex">

<header style="height:auto;min-height:80vh;">
  <h1 id="acc" style="justify-content: center;align-content:center;display:flex"><a  href="{{route('Auth.accueil')}}">Accueil</a></h1>
  <nav style="">
    <ul>
    
      <li>
        <a href="{{route('Auth.annonce.gerer_annonces')}}" data-title="Annonces">Gere Mes Annonces</a>
      </li>
    
      <li>
        <a href="{{route('gerer_perso')}}" data-title="Timeline">Personnelles</a>
      </li>

      <li>
        <a href="{{route('gere_filieres')}}" data-title="Search">Gèrer filière </a>
      </li>
    
      <li>
        <a href="{{route('gere_departements')}}" data-title="Team">Gèrer Departements</a>
      </li>
    
      <li>
        <a href="javascript:void(0);" data-title="Diary">Gèrer salles</a>
      </li>
    
      <li>
        <a href="javascript:void(0);" data-title="Settings">Inscrire class</a>
      </li>
    
        
      <li>
         <a href="{{url('logout')}}" data-title="Logout">Logout</a>
      </li>
    
    </ul>


  </nav>
</header>

<main style="float: right;">

 

  @yield('frameContent')

</main>


</div>



@endsection

  