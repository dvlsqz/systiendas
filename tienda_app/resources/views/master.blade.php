<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ Config('cms.name') }} - @yield('title') </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"> 
    <meta name="csrf-token" content=" {{ csrf_token() }} ">
    <meta name="RouteName" content=" {{ Route::currentRouteName() }} ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ url('/static/css/style.css?v='.time() ) }}">
    @yield('custom_css')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet"> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ url('/static/js/app.js?v='.time() ) }}"></script>
    @yield('custom_js')
    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
</head>
<body>

    @include('components.loader_action')
    @include('components.os_modal')

    <div class="loader" id="loader" style="background-image: url('{{ url('/static/images/loader/bg.png') }}')">
        <div class="top">
            <img src="{{ url('/static/images/loader/top.png') }}" >
        </div>

        <div class="footer">
            <img src="{{ url('/static/images/madecms_logo.png') }}" >
        </div>

        <div class="logo">
            <img src="{{ url('/static/images/logo_store.png') }}" >
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <nav>
            <div class="nav-wrapper">
                <a href=" {{ url('/') }} " class="brand-logo center sl">
                    <img src="{{ url('/static/images/logo_store.png') }}" >
                </a>

                <a href="#" data-target="sidebar" class="sidenav-trigger">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                </svg>
                </a>
            </dvi>
        </nav>

        <ul id="sidebar" class="sidenav">

        </ul>

    
        @yield('content')
    </div>
</body>
</html>