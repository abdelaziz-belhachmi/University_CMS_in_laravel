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
        <select name="local_id" id="locaux" required>
            <option style="color: silver" disabled selected value> -- toutes les Locaux -- </option>
            
            @foreach ($locauxreserve as $res)
            <option style="color: red" disabled value >{{$res->Nom_local}}</option>
            @endforeach

            @foreach ($locauxLibres as $ll)
            <option value="{{$ll->id}}" >{{$ll->Nom_local}}</option>                
            @endforeach
        
        </select>

        <input type="submit" name="submit" value="submit" class="submit" >
    </form>

    </div>

    <script>
        function _reserver_local(year,month,day,hour,local_id){
            window.location.href = `/creneau/${year}/${month}/${day}/${hour}/${local_id}`;
        }
    </script>

</div>

</section>

</div>
    

  
  @endsection