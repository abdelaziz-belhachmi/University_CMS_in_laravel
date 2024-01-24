@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel="stylesheet" href="../../../../css/creneaucss.css">

<div style="display:flex;justify-content:center;height:100%;align-items:center; ">

<div style="width:40vw;">

    <div style="display:block;">
        <center>
            <div style="font-weight: 700; font-size:30px;color:#8FB5E5"><p>{{$day}}/{{$month}}/{{$year}}</p></div>
        </center>

        <div class="dvcre" onclick="Creneau('{{$year}}','{{$month}}','{{$day}}','9');" style="display:flex;justify-content:center;margin:25px;border-radius:50px;background-color:#8FB5E5;padding:8px;;font-weight: 700; font-size:25px;color:white"><p>creneau 9h - 10h45</p></div>
        <div class="dvcre" onclick="Creneau('{{$year}}','{{$month}}','{{$day}}','11');" style="display:flex;justify-content:center;margin:25px;border-radius:50px;background-color:#8FB5E5;padding:8px;;font-weight: 700; font-size:25px;color:white"><p>creneau 11h - 12h45</p></div>
        <div class="dvcre" onclick="Creneau('{{$year}}','{{$month}}','{{$day}}','13');" style="display:flex;justify-content:center;margin:25px;border-radius:50px;background-color:#8FB5E5;padding:8px;;font-weight: 700; font-size:25px;color:white"><p>creneau 13h - 14h45</p></div>
        <div class="dvcre" onclick="Creneau('{{$year}}','{{$month}}','{{$day}}','15');" style="display:flex;justify-content:center;margin:25px;border-radius:50px;background-color:#8FB5E5;padding:8px;;font-weight: 700; font-size:25px;color:white"><p>creneau 15h - 18h45</p></div>
        <div class="dvcre" onclick="Creneau('{{$year}}','{{$month}}','{{$day}}','17');" style="display:flex;justify-content:center;margin:25px;border-radius:50px;background-color:#8FB5E5;padding:8px;;font-weight: 700; font-size:25px;color:white"><p>creneau 17h - 18h45</p></div>

    </div>

    <script>
        function Creneau(year,month,day,hour){
            window.location.href = `/creneau/${year}/${month}/${day}/${hour}`;
        }
    </script>

</div>
</div>
    

  
  @endsection