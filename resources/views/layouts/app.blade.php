<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>WoundCare</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/paper.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/flatly.css') }}" rel="stylesheet">
    {{--<link href="{{ asset('css/pluse.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/cerulean.css') }}" rel="stylesheet">--}}
    {{--<link href="{{ asset('css/journal.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt|Pridi|Taviraj" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <b>{{ config('app.name', 'Laravel') }}</b>
                        {{--<img src="{{ url('/img/logo6.png') }}" alt="">--}}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('about') }}">เกี่ยวกับ</a></li>
                            <li><a href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        @else
                            @if(Request::is('doctor/*'))
                            <li>
                                <a href="{{ url('home') }}">Waiting Case
                                    <span class="badge noti" style="background: #ff0000;">
                                        0
                                    </span>
                                </a>
                            </li>
                            @endif
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('profile/'.Auth::user()->id) }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                $.ajax({ url: "/doctor/" + {{ Auth::id() }} +"/wait_case",
                    context: document.body,
                    success: function(data){
                        $('.noti').html(data)
                    }})
            });

            var pusher = new Pusher('1e4d478aa105544cfa1a', {
                cluster: 'ap1',
                encrypted: true
            });

            // Subscribe to the channel we specified in our Laravel Event
            var channel = pusher.subscribe('doctor-notification');

            channel.bind('App\\Events\\ReceiveWoundImage', function (data) {
                var newNotificationHtml = `<b>`+ data.wait_case +`</b>`;

                $('.noti').html(newNotificationHtml);
            })
        </script>

        @yield('content')
    </div>

    <!-- Scripts -->

    @yield('navigation')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
