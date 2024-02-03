@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title','Login Page')
@section('content')

<link rel="stylesheet" href="css/dep.css">

<style>
    body{
    background-color: white !important;
    }
    #departements {
        background-color: white;
        margin-bottom: 40px;
    }
    .section__solg{
        color: #8FB5E5;
    }
</style>
<section class="section departements" id="departements" style="min-height: 50vh">

    <div class="wrapper">

            <h1 class="section__title"></h1>

            <p class="section__solg" > DÉPARTEMENTS </p>

            <div class="three-columns section-content departements-wrapper">
                
                @foreach ($dep as $d)
                        
                <div class="departement-card">
                        <img src="/images/imagesdep/dep_img.png" class="departement__img">
                        <div class="departement-infos">
                            
                            <h3>{{$d->Nom_departement}}</h3>

                            <p>{{$d->Code_departement}}</p>
                            
                            @if ($d->chefDepartement)
                            <p>Chef : {{$d->chefDepartement->user->name}} {{$d->chefDepartement->user->prenom}}</p>
                            <p>Email : {{$d->chefDepartement->user->email}}</p>
                            @endif
                            
                        </div>
                </div>
                @endforeach

        </div>
    </div>
</section>
    


@endsection
