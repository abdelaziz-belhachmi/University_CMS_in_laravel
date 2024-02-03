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
        <input type="text" name="sujet_reservation" placeholder="Sujet Reservation" required>

        <input type="text" style="display: none" name="day" id="day" value="{{$day}}">
        <input type="text" style="display: none" name="hour" id="hour" value="{{$hour}}">
        <input type="text" style="display: none" name="month" id="month" value="{{$month}}">
        <input type="text" style="display: none" name="year" id="year" value="{{$year}}">
        
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
            {{-- <label>Réservation consernant une class ?</label> --}}
                {{-- <div name="classes" id="classes" style="display: flex" onclick="switchColors();">
                    <a id="nona" value="0" style="background-color:rgb(45, 150, 69);color: rgb(194, 194, 194);padding:10px"> NON </a>
                    <a id="ouia" value="1" style="background-color:rgb(94, 94, 94);color: rgb(194, 194, 194);padding:10px"> OUI </a>
                </div> --}}
        

                <div>
                    <br>
                    <label>associer a un module</label>
                    <select name="modules" id="modules" style="padding: 8px" required>
                        @foreach ($modules as $module)
                        <option value="{{$module->id}}">{{$module->nom_module}}</option>
                        @endforeach

                    </select>
                </div>
                <div style="height: 20px"></div>


                <div id="divclass" style="">
                    <label>Les classes libres dans ce creneau , qui apartient au module choisi</label>
                    <select name="classe" id="classe" style="padding: 8px" required>
                            {{--  --}}
                    </select>
                </div>


                <div style="height: 20px"></div>

                <div>
                    <label>Réservation récurrente chaque semaine durant toute la semestre ?</label>
                    <select name="recurr" id="recurr" style="padding: 8px">
                        <option value="non">non</option>
                        <option value="oui">oui</option>
                    </select>
                </div>

            
        @endif

        <input type="submit" name="submit" value="submit" class="submit" >
    </form>

    </div>



    <script>

async function onOptionChange() {
      // Get the selected value
      var selectedValue = document.getElementById("modules").value;
      var hour=document.getElementById("hour").value;
      var day=document.getElementById("day").value;
      var month=document.getElementById("month").value;
      var year=document.getElementById("year").value;


    route = '/creneau/'+year+'/'+month+'/'+day+'/'+hour+'/'+selectedValue;
    const response = await fetch(route);

const res = await response.json();
console.log(res);

var selectElement = document.getElementById("classe");
selectElement.innerHTML = '';


for (var key in res) {
    if (res.hasOwnProperty(key)) {

resk = res[key];

    for (var keys in resk) {
    if (resk.hasOwnProperty(keys)) {

    console.log(keys + ': ');


if(keys == 'id'){
    var newOption = document.createElement('option');
    newOption.value = resk[keys];
}
if (keys == 'nom_classe'){
    newOption.text = resk[keys];
    selectElement.appendChild(newOption);
}

}}}}}

// event listener on select change
document.getElementById("modules").addEventListener("change", onOptionChange);
 

        function _reserver_local(year,month,day,hour,local_id){
            window.location.href = `/creneau/${year}/${month}/${day}/${hour}/${local_id}`;
        }

 
    </script>

</div>

</section>

</div>
 


  @endsection