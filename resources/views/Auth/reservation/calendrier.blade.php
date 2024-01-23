@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel="stylesheet" href ="../../../../css/calendrier.css">
<script src="../../../../js/calendrier.js">


 <div style="display: flex;justify-content:end;">

     <button  style="height:50px;padding-inline:25px;color:rgb(0, 0, 0);align-self:center; background:#70a3e0;border:none" onclick="make();" class="dropbtn" >Nouvel Filiere</button>
 </div>
<div  id="_calend" style="justify-content:center;">
    <div class="contianer">
        <div class="calendar">
          <div class="calendar-header">
            <span class="month-picker" id="month-picker"> May </span>
            <div class="year-picker" id="year-picker">
              <span class="year-change" id="pre-year">
                <pre><</pre>
              </span>
              <span id="year">2020 </span>
              <span class="year-change" id="next-year">
                <pre>></pre>
              </span>
            </div>
          </div>
    
          <div class="calendar-body">
            <div class="calendar-week-days">
              <div>Sun</div>
              <div>Mon</div>
              <div>Tue</div>
              <div>Wed</div>
              <div>Thu</div>
              <div>Fri</div>
              <div>Sat</div>
            </div>
            <div class="calendar-days">
            </div>
          </div>
          <div class="calendar-footer">
          </div>
          <div class="date-time-formate">
            <div class="day-text-formate">TODAY</div>
            <div class="date-time-value">
              <div class="time-formate">01:41:20</div>
              <div class="date-formate">03 - march - 2022</div>
            </div>
          </div>
          <div class="month-list"></div>
        </div>
      </div>

    
    </div>
    
    

       
    
  
  @endsection