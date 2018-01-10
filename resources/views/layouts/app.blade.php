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
    <link href="//use.fontawesome.com/1472eb6afe.css" media="all" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li @if(isset($activePage) && ($activePage == 'employers-departments')) class="active" @endif><a href="{{route('employers-departments.index')}}">Сетка</a></li>
                        <li @if(isset($activePage) && ($activePage == 'departments')) class="active" @endif><a href="{{route('departments.index')}}">Отделы</a></li>
                        <li @if(isset($activePage) && ($activePage == 'employers')) class="active" @endif><a href="{{route('employers.index')}}">Сотрудники</a></li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- language locale -->
                        <li><a href="{{ route('setlocale', ['locale' => 'ru']) }}">RU</a></li>
                        <li><a href="{{ route('setlocale', ['locale' => 'en']) }}">EN</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="//use.fontawesome.com/1472eb6afe.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
