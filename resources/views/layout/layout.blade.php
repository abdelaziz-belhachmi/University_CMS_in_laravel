<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FStt CMS Laravel')</title>

<style>
  

body{
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow-x:hidden;
 
    
}
        .centered-div {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f0f0f0;
        }
		.logo-Nav-bar{
			align-self: baseline !important;
			color: #f0f0f0 !important;
            font-family:Muli, sans-serif;
			text-decoration: none !important; 
		}
        .title {
  /* background-color: #fff; */
  /* border-bottom: 1px solid #C0C1C0; */
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display:flex;
  
  
  & a {
    color: #000000;
    width: auto;
    margin: 0 20px;
    float: right;
    line-height: 62px;
    position:relative;
    text-decoration:none;
    transition:all .5s;
    
    &:before {
      content:"\1f464";
      font-size: 28px;
      position:absolute;
      right:50px;
      font-family: 'entypo';
    }
  }
}

/*  */
    /* a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
} */

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color:  #8FB5E5 ;
    color:white;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(77, 138, 199, 0.793);
}

.menu-left, .menu-right, .logo {
    display: flex;
    align-items: center;	
}

.logo img {
    max-height: 70px;
}


.cta-button {
    background-color: #007bff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background: linear-gradient(to right,#EECD0C, #0094FF);
}


/*FOOTER*/
footer {
	color: #E5E8EF;
	background: #8FB5E5;
	padding: 50px 30; 
}
footer .footer-container {
	max-width: 1300px;
	margin: auto;
	display: flex;
	justify-content: space-between;
	align-items: center;
	flex-wrap: wrap-reverse;
}


footer .social-media a{
	margin-right: -15px;
	font-size: 22px;
	text-decoration: none;
}
footer .right-col h1{
	font-size: 26px;
}
footer .border{
	width: 100px;
	height: 4px;
	background: linear-gradient(to right,#EECD0C, #0094FF);
	margin: 2px;
}
footer .newsletter-form {
	display: flex;
	justify-content: center;
	align-items: center;
}
footer input::placeholder {
  color: #8FB5E5 ;
  font-size:smaller;
}
footer .txtb {
	flex: 1;
	padding: 10px 40px;
	font-size: 16px;
	background:white;
	border: none;
	font-weight: 700;
	border-radius: 5px;
	min-width: 300px;
	margin-top: 20px;
	color:#8FB5E5 ;
    outline: none; 

}
footer .btn {
	margin-top: 20px;
	padding: 10px 40px;
	font-size: 16px;
	color: #f1f1f1;
	background: linear-gradient(to right,#EECD0C, #0094FF);
	border: none;
	font-weight: 700;
	outline: none;
	border-radius: 5px;
	margin-left: 20px;
	cursor: pointer;
	transition: opacity .3s linear;	
}
footer .btn:hover {
	opacity: .7;
}


</style>

</head>

<body>
    <div style="width:100%;display:block;">


        <nav class="navbar">
            <div class="logo">
              <img src="/images/logoFstt.png" alt="Logo" />
            </div>
           
            @if (Route::has('login') && !request()->is('login'))
            <div style="align-items:center;display:flex">
            @auth
            <div class="" style="color: #001959">

               <a style="color: white;font-weight:700" href="{{route('home')}}">{{ Auth::user()->name}}</a>
            
              </div>
            @else
                <a href="{{ route('login') }}" class="" style="font-size:25px;color:white;padding:10px"> Se Connecter</a>
            @endauth

            </div>
       @endif


          </nav>
          


        <main class="" style="width: 99vw;justify-content:center;">
            @yield('content')

          

   <!-- FOOTER -->
   <footer>
<div class="footer-container" style="margin:0px;">
        <div class="left-col" style="margin-top: 20px ">
            <div style="display:flex; justify-content: stretch;">
            <div>
            <img src="/images/icon/fst-1024x383.png" style="width:60px; margin-left: 30%; float:left;margin-top:10px;">
           </div><div style="margin-left:9%; float:right;color: #005693 ; font-size: large;">
            <p><span> Université Abdelmalek Essaâdi</span><br><span> Faculté des Sciences et Techniques de Tanger </span> </p>           
            </div>
        </div>
            <p style="font-size:medium;"><img src="/images/icon/location.png"> Ancienne Route de l'Aéroport, Km 10, Ziaten.  <br>  BP : 416. Tanger-Maroc·<br><img src="/images/icon/phone.png"> 
                + 212 (0) 5 39 39 39 54 / 55<br><img src="/images/icon/mail.png"> administration.fstt@uae.ac.ma
            </p>
            
        </div>
        <div class="right-col">
            <p style="color: #fff;font-size:20px;font-weight:400" >Newsletter</p>
            <div class="border"></div><br>
            <form class="newsletter-form">
                <input class="txtb" type="email" placeholder="Entrez votre e-mail pour recevoir nos actualités">
                <input class="btn" type="submit" value="S'abonner">
            </form>
            <div class="social-media" style="display: flex; align-items:center">
                <a href="https://web.facebook.com/fstt.ac.ma" target="_blank"><img src="/images/icon/logofacebook.png" style="width :52px "></a>
                <a href="https://www.linkedin.com/school/fsttanger/" target="_blank"><img src="/images/icon/logolinkedinb.png" style="margin-top:-3px;width :55px"></a>
                <a href="https://www.instagram.com/fsttanger/" target="_blank"><img src="/images/icon/logoinstab.png" style="width: 53px"></a>
            </div>
            
        </div>
    </div>
  </footer>
  



        </main>

    </div>

 

    <!-- Include your JavaScript scripts or any other scripts here -->
</body>
</html>
