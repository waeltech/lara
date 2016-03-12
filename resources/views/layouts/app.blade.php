<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif|Ubuntu' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    
    <link rel="stylesheet" href="{{ URL::asset('public/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('public/css/main.css') }}" />

</head>
<body>
    <header> 
        <div id="logo">
            <a class="Webtitle" href="{{ url('/') }}">
                    jobs U1470153
            </a> 
        </div>
        <div id="login">
            <ul class="nav main">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" class="large button green">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="large button blue">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            welcome : {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}" class="large button red">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </header>
    <div id='cssmenu'>

                <!-- Left Side Of Navbar -->
                <ul>
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/jobs') }}">Jobs</a></li>
                    <li class='last'><a href="{{ url('/design') }}">Design</a></li>
                </ul>

                
    </div>
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    @yield('content')
    <footer> <a href="http://www.waeltech.com">Copyright Wael Aziz U1470153 </a> </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
