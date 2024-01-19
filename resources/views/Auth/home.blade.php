@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title',' dashboard')
@section('content')

<link rel="stylesheet" href="../css/auth_home.css">
   {{-- <span class="bckg"></span> --}}
   <div>

<header>
  <h1><a href="{{route('Auth.accueil')}}">Accueil</a></h1>
  <nav>
    <ul>
      <li>
        <a href="{{route('Auth.gerer_annonces')}}" data-title="Annonces">Cree Annonces</a>
      </li>
      <li>
        <a href="javascript:void(0);" data-title="Team">Gèrer emplois</a>
      </li>
      <li>
        <a href="javascript:void(0);" data-title="Diary">Gèrer salles</a>
      </li>
      <li>
        <a href="javascript:void(0);" data-title="Timeline">Personnelles</a>
      </li>
      <li>
        <a href="javascript:void(0);" data-title="Settings">Inscrire class</a>
      </li>
      <li>
        <a href="javascript:void(0);" data-title="Search">Gèrer filière </a>
      </li>
      <li>
         <a href="{{url('logout')}}"data-title="Logout">Logout</a>
      </li>
    </ul>
  </nav>
</header>
<main>
  <div class="title">
    <h2></h2>
    {{-- <a >Hello Bob !</a> --}}
   <a href="javascript:void(0);">welcome, {{ Auth::user()->name}}</a>

  </div>

  @yield('frameContent')

</main>
</div>

@endsection
