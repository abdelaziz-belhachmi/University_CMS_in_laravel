<!-- resources/views/auth/login.blade.php -->

@extends('layout.layout') <!-- Assuming you have a master layout, modify this as needed -->
@section('title','Login Page')
@section('content')

<link rel="stylesheet" href="css/loginStyle.css">

    <div class="ctrlogin" >
           
    {{--  --}}
    <div class="form-box" id="scrollbar1">

        <form id="login" class="iinput-group" method="POST" action="{{route('login')}}">
            @csrf

            <center><h1 class="cn" >Connectez Vous</h1></center>
            <div class="inp">
                <img src="/images/user.png">
                <input type="text" id="email" name="email" class="input-field" placeholder="Adresse e-mail" style="height:40px;width: 88%;" required>
            </div>

            <div class="inp">
                <img src="/images/password.png" >
                <input type="password" id="password" name="password" class="input-field" placeholder="Mot de Passe" style="height:40px;width: 88%; " required>
            </div>

            {{-- <input type="checkbox" class="check-box">Remember Password --}}
            <div style="width: 100%;display: flex; justify-content: center;">
                <button  style="" type="submit" class="btn"> {{ __('Login') }}</button>
            </div>
            
        </form>

       
    </div>

    {{--  --}}
    </div>

@endsection
