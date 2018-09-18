<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navMain">	  		
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>	    
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top"><b class="p2"><i class="fa fa-paw"></i></b></a>
                </div>
                <div class="collapse navbar-collapse pull-right" id="navMain">
                    <ul class="nav navbar-nav pull-right">
                        <li><a class="page-scroll" href="{{ url('/beranda')}}">Beranda</a></li>
                        <li><a class="page-scroll" href="{{ url('/beranda')}}#about">Tentang</a></li>
                        <li><a class="page-scroll" {{ request()->is('login') ? 'style=color:red' : '' }} href="{{ route('login') }}">Login</a></li>
                        <li><a class="page-scroll" {{ request()->is('register') ? 'style=color:red' : '' }} href="{{ route('register') }}">Bergabung</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br>

        <!-- alert -->
        @include('layouts.partials._alert')

        <!-- loading -->
        @include('layouts.partials.loadrubi')

        <!-- content-start -->
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>