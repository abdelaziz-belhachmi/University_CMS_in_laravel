@extends('user.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('title', ' Accueil')
@section('contents')

{{-- 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

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
  border-spacing: 0;
  border-collapse: separate;
  table-layout: fixed;
  margin-bottom: 50px;
}

table thead tr th {
  padding: 0.5em;
  overflow: hidden;
}

table thead tr th:first-child {
  border-radius: 3px 0 0 0;
}

table thead tr th:last-child {
  border-radius: 0 3px 0 0;
}

table thead tr th .day {
  display: block;
  font-size: 1.2em;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  margin: 0 auto 5px;
  padding: 5px;
  line-height: 1.8;
}

table thead tr th .day.active {
  background: var(--light);
  color: var(--blue);
}

table thead tr th .short {
  display: none;
}

table thead tr th i {
  vertical-align: middle;
  font-size: 2em;
}
/* 
table tbody tr {
  background: var(--light);
} */
/* 
table tbody tr:nth-child(odd) {
  background: var(--light2);
} */

table tbody tr:nth-child(4n + 0) td {
  border-bottom: 1px solid var(--blue);
}

table tbody tr td {
  text-align: center;
  vertical-align: middle;
  border-left: 1px solid var(--blue);
  position: relative;
  height: 32px;
  cursor: pointer;
}

table tbody tr td:last-child {
  border-right: 1px solid var(--blue);
}

table tbody tr td.hour {
  font-size: 2em;
  padding: 0;
  color: var(--blue);
  background: #fff;
  border-bottom: 1px solid var(--blue);
  border-collapse: separate;
  min-width: 100px;
  cursor: default;
}

table tbody tr td.hour span {
  display: block;
}

@media (max-width: 60em) {
  table thead tr th .long {
    display: none;
  }

  table thead tr th .short {
    display: block;
  }
}

@media (max-width: 27em) {
  table thead tr th {
    font-size: 65%;
  }

  table thead tr th .day {
    display: block;
    font-size: 1.2em;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    margin: 0 auto 5px;
    padding: 5px;
  }

  table thead tr th .day.active {
    background: var(--light);
    color: var(--blue);
  }

  table tbody tr td.hour {
    font-size: 1.7em;
  }

  table tbody tr td.hour span {
    transform: translateY(16px) rotate(270deg);
    -webkit-transform: translateY(16px) rotate(270deg);
    -moz-transform: translateY(16px) rotate(270deg);
  }
}



</style>


<table>
  <thead>
    <tr>
      <th></th>
      <th>
        <span class="day">1</span>
        <span class="long">Monday</span>
        <span class="short">Mon</span>
      </th>
      <th>
        <span class="day">2</span>
        <span class="long">Tuesday</span>
        <span class="short">Tue</span>
      </th>
      <th>
        <span class="day">3</span>
        <span class="long">Wendsday</span>
        <span class="short">We</span>
      </th>
      <th>
        <span class="day">4</span>
        <span class="long">Thursday</span>
        <span class="short">Thur</span>
      </th>
      <th>
        <span class="day active">5</span>
        <span class="long">Friday</span>
        <span class="short">Fri</span>
      </th>
      <th>
        <span class="day">6</span>
        <span class="long">Saturday</span>
        <span class="short">Sat</span>
      </th>
      <th>
        <span class="day">7</span>
        <span class="long">Sunday</span>
        <span class="short">Sun</span>
      </th>
    </tr>
  </thead>



  <tbody>
  
  
    <tr>
      <td class="hour" rowspan="4"><span>9:00</span></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>



    <tr>
      <td class="hour" rowspan="4"><span>11:00</span></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    


    <tr>
      <td class="hour" rowspan="4"><span>13:00</span></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>



    <tr>
      <td class="hour" rowspan="4"><span>15:00</span></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>


    <tr>
      <td class="hour" rowspan="4"><span>17:00</span></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
   
  </tbody>
</table>

@endsection