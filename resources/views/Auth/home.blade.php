@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' Dashboard')
@section('content')

<link rel="stylesheet" href="../css/auth_home.css">
   {{-- <span class="bckg"></span> --}}
   <div style="display: flex">

<header style="background-color:white;height:auto;min-height:80vh;">
  {{-- <h1 id="acc" style="justify-content: center;align-content:center;display:flex;background-color:white"></h1> --}}
  <nav style="">
    <ul style="text-align:center">
    
      <li>
        <a  href="{{route('Auth.accueil')}}">Accueil</a>
      </li>

      <li>
        <a href="{{route('Auth.annonce.gerer_annonces')}}">Gérer Mes Annonces</a>
      </li>

      <li>
        <a href="{{route('gerer.emploi')}}">Emplois de Temps</a>
      </li>

    <li>
      <a href="{{route('demandes')}}">Gérer Les Demandes</a>
    </li>

    @if(Auth::user()->role == 1)
    <li>
      <a href="{{route('MesClasses')}}">Mes Classes</a>
    </li>
    @endif

      @if(Auth::user()->role == 4)
      <li>
        <a href="{{route('gerer_perso')}}" data-title="Timeline">Personnelles</a>
      </li>

      <li>
        <a href="{{route('gere_filieres')}}" data-title="Search">Gérer  les filières </a>
      </li>
    
      <li>
        <a href="{{route('gere_departements')}}" data-title="Team">Gérer Départements</a>
      </li>
      @endif
      
      @if(Auth::user()->role != 1)
      @if(Auth::user()->role != 2)
      <li>
        <a href="{{route('gere_locals')}}" data-title="Diary">Gèrer Les locaux</a>
      </li>
      @endif

      <li>
        <a href="{{route('afficherCalendrier')}}" data-title="Timeline">Réserver salles</a>
      </li>
      @endif
      
      @if(Auth::user()->role == 4)

      <li>
        <a href="{{route('gerer_classes')}}" data-title="Settings">Gèrer Les classes</a>
      </li>
      @endif
    
        
      <li>
         <a href="{{url('logout')}}" data-title="Logout">Se déconnecter</a>
      </li>
    
    </ul>


  </nav>
</header>

<main style="float: right;background-color:white">

 

  @yield('frameContent')

</main>


</div>



@endsection

  