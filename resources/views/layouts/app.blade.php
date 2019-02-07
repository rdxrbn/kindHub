<!doctype html>
<html lang="en">
<head>
    @section('meta')
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('js/bulma.js')}}"></script>
    @show
    <title>@yield('title')</title>

    @yield('css')
</head>
<body>
<div class="block ">
    <div class="columns is-gapless">
        <div class="mainBlock"></div>
        <div class="column is-12">
            <nav class="navbar is-transparent ">
                    <div class="navbar-brand is-hidden-desktop is-hidden-tablet is-hidden-widescreen is-hidden-fullhd ">
                        <a class="navbar-item" href="{{url('/')}}">
                            KindHub Elementry School
                        </a>
                        <div class="navbar-burger burger" data-target="navMenubd-example">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div id="navbarExampleTransparentExample" class="navbar-menu">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="#" style="color: #000;">
                                KindHub Elementry School
                            </a>
                            <div class="navbar-burger burger" data-target="navMenubd-example">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div id="navMenubd-example" class="navbar-menu">
                            <div class="navbar-start">
                                <div class="navbar-item has-dropdown is-hoverable is-menu is-active">
                                    <a href="#" class="parent is-active"><i class="fi flaticon-funds"></i> Students</a>
                                </div>
                            </div>

                            <div class="navbar-end">
                                <div class="navbar-item" style="border-right: none;">
                                    Hi ! <b>{{\Illuminate\Support\Facades\Auth::user()->name}}</b>
                                    <div class="field is-grouped">
                                        <p class="control">
                                        <form class="" action="{{route('Common.logout')}}" method="POST">
                                            {!!  csrf_field() !!}
                                            <button class="button is-logout" type="submit" name="logout">
                                        <span class="icon">
                                            <i class="fas fa-power-off"></i>
                                         </span>
                                                Logout
                                            </button>
                                        </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

            </nav>

            @yield('content')

        </div>
    </div>
</div>

<footer>
    <div class="columns " style="    background: rgba(104, 114, 128, 0.1);background: rgba(104, 114, 128, 0.1);">
        <div class="column"></div>
        <div class="column is-6 has-text-centered">
            Made With <span style="color:red;font-size: 25px;">&hearts;</span> <span class="author">by Rooban Viveh</span>.
        </div>
        <div class="column"></div>
    </div>
</footer>

</body>

<script type="text/javascript">

    $('#nav-toggle').click(function(e) {
        e.stopPropagation();
        $(".menu").toggleClass('bar')
    });
    $('body').click(function(e) {
        if ($('.menu').hasClass('bar')) {
            $(".menu").toggleClass('bar')
        }
    })

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }
    });

</script>


@yield('js')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</html>
