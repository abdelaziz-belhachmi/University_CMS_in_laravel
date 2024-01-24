@extends('auth.home') <!-- Assuming you have a master layout, modify this as needed -->
@section('frameContent')

<link rel="stylesheet" href="../../../../css/auth_home.css">
<link rel="stylesheet" href ="../../../../css/calendrier.css">





<div  id="_calend" style="justify-content:center;">
    <div class="contianer">
        <div class="calendar">
          <div class="calendar-header">
            <span class="month-picker" id="month-picker"> May </span>
            <div class="year-picker" id="year-picker">
              <span class="year-change" id="pre-year">
                {{-- <p><</p> --}}
                <img src="../../../images/calendrier/flesh1.png" style="height: 18px" alt="" srcset="">
              </span>
              <span id="year">2020 </span>
              <span class="year-change" id="next-year">
                {{-- <p>></p> --}}
                <img src="../../../images/calendrier/flesh2.png" style="height: 18px" alt="" srcset="">

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
    
    

<script src="../../../../js/calendrier.js"></script>
       
    
  
  @endsection