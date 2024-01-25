@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title','Login Page')
@section('content')

<link rel="stylesheet" href="css/dep.css">


<section class="section departements" id="departements">

    <div class="wrapper">

            <h1 class="section__title"></h1>

            <p class="section__solg" > DÉPARTEMENTS </p>

            <div class="three-columns section-content departements-wrapper">
             
                <div class="departement-card">                  
                        <img src="/images/imagesdep/geniemecanique.jpg" class="departement__img">
                        <div class="departement-infos">
                            <h3>GÉNIE MÉCANIQUE</h3>
                            <p>Chef : Pr.ELAYACHI Ilham</p>
                            <p>Email : i.elayachi@uae.ac.ma</p>
                        </div>
                </div>    
        </div>
    </div>
</section>
    


@endsection
