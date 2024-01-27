@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', 'Mes demandes')
@section('contents')


<link rel="stylesheet" href="../../../css/auth_home.css">

    {{-- <h1>afficher ici dashboard de crud demandes</h1> --}}
    @if (Auth::user()->role === 0)
        <div style="background-color:#d8d8d8;height:80px ; display:flex;justify-content:end">

            <a class="button-blacke" href="{{ route('user.demande') }}"> 👨🏻‍💻Faire une Demande 👩‍💻</a>

        </div>
    @endif

    <section class="larg">

        @if (session('message'))
            <div style="background-color: green; color: white; padding: 10px; text-align: center; border-radius: 5px;">
                {{ session('message') }}
            </div>
        @endif

        @foreach ($demandes as $demande)
            <div>
                <h3> {{ $demande->type }}<span class="entypo-down-open"></span></h3>

                @if (auth()->user()->role !== 0)
                    
                    <h6>{{ $demande->etudiant->name }}</h6>
                    <h6>{{ $demande->etudiant->email }}</h6>
                @endif

                <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur">Type de Document
                    :{{ $demande->type }}</h6>
                <h6 style="padding: 0px; margin:0px;display: block" id="date_cre" for="auteur">Faite Le
                    :{{ $demande->created_at }}</h6>
                <h6 style="padding: 0px; margin:0px;display: block" id="auteur" name="auteur">Etudiant(e) :
                    {{ $demande->user_id }} </h6>
                <p>{{ $demande->description }}</p>
                <div style="border:none;display: flex;justify-content:end">

            
                    <form action="{{ route('demandes.destroy', $demande->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-blackes">🚮 Supprimer</button>
                    </form>

                </div>
            </div>
        @endforeach


    </section>



    <script src="../../../js/auth_home.js"></script>
@endsection
