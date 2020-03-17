<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Netflixify</title>

    <!--font awesome-->
  <link rel="stylesheet" href="{{asset('css/font-awesome5.11.2.min.css')}}">

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <!--vendor css-->
    <link rel="stylesheet" href="{{asset('css/vendor.min.css')}}">

    <!--google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,500,700&display=swap" rel="stylesheet">

    <!--main styles -->
    <link rel="stylesheet" href="{{asset('css/main.min.css')}}">
</head>
<body>



 @yield('content')

<!--jquery-->
<script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>

<!--bootstrap-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>

<!--vendor js-->
<script src="{{asset('js/vendor.min.js')}}"></script>

<!--main scripts-->
<script src="{{asset('js/main.min.js')}}"></script>

 {{--player js--}}
 <script src="{{ asset('js/playerjs.js') }}"></script>


 <script>

     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });



     $(document).ready(function () {

        $("#banner .movies").owlCarousel({
            loop: true,
            nav: false,
            items: 1,
            dots: false,
        });

        $(".listing .movies").owlCarousel({
            loop: true,
            nav: false,
            stagePadding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                900: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            },
            dots: false,
            margin: 15,
            loop: true,
        });

    });
</script>

 @stack('scripts')
</body>
</html>
