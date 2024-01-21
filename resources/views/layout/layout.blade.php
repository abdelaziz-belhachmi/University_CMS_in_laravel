<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App')</title>
    <!-- Include your CSS stylesheets, scripts, or any other head elements here -->

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
    color: #AAA;
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
      right:-50px;
      font-family: 'entypo';
    }
  }
}

		

     
    </style>
</head>

<body>
    <div style="width:100%;display:block;">

    <div id="" style="background: #262626;height:80px;width:100%;align-items:center;display:flex;">
        <div style="margin-right:50px;;margin-left:50px;display:flex;justify-content:space-between;width:100% ; ">
            
            <div class="" style="height:100%;align-self:center;font-size:20px" >
                <a class="logo-Nav-bar" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

              @if (Route::has('login') && !request()->is('login'))
                    <div style="align-items:center;display:flex">
                    @auth
                    <div class="title" >

                       <a href="javascript:void(0);">{{ Auth::user()->name}}</a>
                    
                      </div>
                        {{-- <a href="{{ route('Logout') }}" class="" style="font-size:25px;color:#e5e7eb;padding:10px">Logout</a> --}}
                    @else
                        <a href="{{ route('login') }}" class="" style="font-size:25px;color:#e5e7eb;padding:10px">Log in</a>
                    @endauth

                    </div>
               @endif

        </div>

    </div>

        {{-- <div class="" style="height:100px;background-color:red">
           
        </div> --}}

        <main class="" style="width: 99vw;justify-content:center;">
            @yield('content')
        </main>

    </div>
    

    <!-- Include your JavaScript scripts or any other scripts here -->
</body>
</html>
