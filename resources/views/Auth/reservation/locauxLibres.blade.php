@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel="stylesheet" href="../../../../css/creneaucss.css">

<div style="display:flex;justify-content:center;height:100%; ">
<section id="contact">

<div  id="content" style="">

    <div id="form" style="display:block;">
        <center>
            <div style="font-weight: 700; font-size:30px;color:#8FB5E5"><p>Le {{$day}}/{{$month}}/{{$year}} a {{$hour}}H</p></div>
        </center>

        <form action="/Auth/reserver" method="post" id="contactForm" >
            @csrf
        <span>Titre Reservation</span>
        <input type="text" name="Titre_reservation" placeholder="Titre Reservation" required>

        <span>Sujet reservation</span>
        <input type="text" name="sujet_reservation" placeholder="Titre Reservation" required>

        <input type="text" style="display: none" name="day" value="{{$day}}">
        <input type="text" style="display: none" name="hour" value="{{$hour}}">
        <input type="text" style="display: none" name="month" value="{{$month}}">
        <input type="text" style="display: none" name="year" value="{{$year}}">
        
        <span>Locaux</span>
        <select name="local_id" id="locaux" required style="padding: 8px">
            <option style="color: silver" disabled selected value> -- toutes les Locaux -- </option>
            
            @foreach ($locauxreserve as $res)
            <option style="color: red" disabled value >{{$res->Nom_local}}</option>
            @endforeach

            @foreach ($locauxLibres as $ll)
            <option value="{{$ll->id}}" >{{$ll->Nom_local}}</option>                
            @endforeach
        
        </select>

<div style="min-height: 25px"></div>
       
        @if(Auth::user()->role == 3)
            <label>Réservation consernant une class ?</label>
                <div name="classes" id="classes" style="display: flex" onclick="switchColors();">
                    <a id="nona" value="0" style="background-color:rgb(45, 150, 69);color: rgb(194, 194, 194);padding:10px"> NON </a>
                    <a id="ouia" value="1" style="background-color:rgb(94, 94, 94);color: rgb(194, 194, 194);padding:10px"> OUI </a>
                </div>

                                    <div style="height: 25px"></div>
            @if(isset($combinedClasses))
                <div id="divclass" style="display: none">
                    <span>Choisissez Une class </span>
                    <select name="classe" id="classe" style="padding: 8px">
                 <option style="color: rgb(63, 63, 63)" disabled selected value> classes libre dans ce creneau</option>
                        
                                @foreach ($combinedClasses as $class)
                                        <option value="{{$class->id}}">{{$class->nom_classe}}</option>
                                @endforeach
                    </select>
                </div>

                <div>
                    <label>Réservation récurrente chaque semaine durant toute la semestre ?</label>
                    <select name="recurr" id="recurr" style="padding: 8px">
                        <option value="oui">oui</option>
                        <option value="non">non</option>
                    </select>
                </div>

            @endif
        @endif

        <input type="submit" name="submit" value="submit" class="submit" >
    </form>

    </div>



    <script>
        function _reserver_local(year,month,day,hour,local_id){
            window.location.href = `/creneau/${year}/${month}/${day}/${hour}/${local_id}`;
        }

        function switchColors() {
        var nona = document.getElementById('nona');
        var ouia = document.getElementById('ouia');
        divclas = document.getElementById('divclass');

        if (nona.style.backgroundColor === 'rgb(45, 150, 69)') {
            nona.style.backgroundColor = 'rgb(94, 94, 94)';
            nona.style.color = 'rgb(194, 194, 194)';
            ouia.style.backgroundColor = 'rgb(45, 150, 69)';
            ouia.style.color = 'rgb(194, 194, 194)';

            divclas.style.display = '';
        } else {
            nona.style.backgroundColor = 'rgb(45, 150, 69)';
            nona.style.color = 'rgb(194, 194, 194)';
            ouia.style.backgroundColor = 'rgb(94, 94, 94)';
            ouia.style.color = 'rgb(194, 194, 194)';
            divclas.style.display = 'none';

        }
    }
    </script>

</div>

</section>

</div>
 


  @endsection