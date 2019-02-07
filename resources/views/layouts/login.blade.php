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
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    @show
    <title>@yield('title')</title>
</head>
<body>
<div class="body-blur"></div>
    <div class="columns is-gapless">
        <div class="column is-4">

        </div>
        <div class="column is-12-mobile is-4">
            @php
                error_reporting(E_ALL);
    ini_set('display_errors', 1);
            @endphp
            @yield('content')
        </div>

    </div>
</body>

<script type="text/javascript">
    $('.codepix').click(function() {
        if ($(this).attr('value') == 'show') {
            $(this).attr('value', 'hide');
            $('.myotherdiv').slideUp();
        } else {
            $(this).attr('value', 'show');
            $('.myotherdiv').slideDown();
        }

        // or if you don't care about changing the button text, simply:
        //$('#myotherdiv').slideToggle();
    });
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


</html>
