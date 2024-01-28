@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', ' Accueil')
@section('contents')

<style>

/* vars */
:root {
  --blue: #8fb5e5;
  --light: #ffffff;
  --light2: #ffffff;
}

table {
  font-family: sans-serif;
  width: 95%;
  border-spacing: 3px;
  border-collapse: separate;
  table-layout: fixed;
  /* padding-bottom: 20px; */
}

table thead tr th {
  padding: 2em;
  overflow: hidden;
}

table tbody tr td {
  text-align: center;
  vertical-align: middle;
  position: relative;
  height: 80px;
  cursor: pointer;
  border: 1px solid var(--blue);
}

table tbody tr td.hour {
  font-size: 2em;
  padding: 0;
  color: var(--blue);
  background: #fff;
  border: 1px solid var(--blue);
  /* border-collapse: separate; */
  min-width: 100px;
  cursor: default;
}

table tbody tr td.hour span {
  display: block;
}

</style>

  <table id="reservationTable">

  <thead>
    <tr>
      <th></th>
      <th>
        <span class="long">Monday</span>
      </th>
      <th>
        <span class="long">Tuesday</span>
      </th>
      <th>
        <span class="long">Wendsday</span>
      </th>
      <th>
        <span class="long">Thursday</span>
      </th>
      <th>
        <span class="long">Friday</span>
      </th>
      <th>
        <span class="long">Saturday</span>
      </th>
      <th>
        <span class="long">Sunday</span>
      </th>
    </tr>
  </thead>

   <tbody>
    @foreach (["9", "11", "13", "15", "17"] as $startTime)
      <tr>
        <td class="hour"><span>{{ $startTime }}:00</span></td>
        @foreach ($structuredReservations[$startTime] as $dayFormat => $reservationsForDay)
          <td>
            @foreach ($reservationsForDay as $reservation)
              <!-- Display reservation details as needed -->
              {{ $reservation->Titre_reservation }}
            @endforeach
          </td>
        @endforeach
      </tr>
    @endforeach
  </tbody>


</table>


<script>
  function updateTableHeaders() {
    var daysOfWeek = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    var today = new Date();
    var currentDay = today.getDay(); 
    var thElements = document.querySelectorAll('thead th span.long');
    for (var i = 0; i < thElements.length; i++) {
      thElements[i].textContent = daysOfWeek[(currentDay + i) % 7];
    }
  }


  function removeLastTdInEachRow() {
    var table = document.getElementById("reservationTable");

    var rows = table.getElementsByTagName("tr");

    for (var i = 0; i < rows.length; i++) {
        var lastTd = rows[i].querySelector("td:last-child");

        if (lastTd) {
            rows[i].removeChild(lastTd);
        }
    }
}

window.onload = updateTableHeaders();
removeLastTdInEachRow();



</script>

@endsection