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
    
}
        .centered-div {
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #f0f0f0;
        }

     
    </style>
</head>

<body>
    <div id="app" style="width:100%">
        <nav class="" style="background: #4b5563 ;padding:0">
            <div class="">
                <a style="font-size:35px;color:#e5e7eb;padding:15px" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                  @if (Route::has('login') && !request()->is('login'))
                        <div dir="rtl">
                        @auth
                            <a href="{{ route('Logout') }}" class="" style="font-size:25px;color:#e5e7eb;padding:10px">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="" style="font-size:25px;color:#e5e7eb;padding:10px">Log in</a>
                        @endauth

                        </div>
                   @endif

            </div>
        </nav>

        <main class="" style="width: 100vw">
            @yield('content')
        </main>
    </div>

    <!-- Include your JavaScript scripts or any other scripts here -->
</body>
</html>
