<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html ng-app="takeNGo" lang="en"  >
<!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <title>Take N Go | Rent a car near you</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="Take N Go is a car rental company which allows customers to find and book available cars nearby." 
        name="description"/>
        <meta content="Franky Gabriel Sanjaya – S3642810, Kendrick Kesley – S3642811, Nadya Safira – S3642868, Veronica Ong – S3642807, 
        Yulita Putri Hartoyo – S3642813" name="author"/>
        <meta content="Take N Go, car rental, car nearby, book a car, booking, cars" name="keywords"/>
        
        <link href="{{asset('css/build.css')}}" rel="stylesheet" type="text/css"/>

        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <body ng-controller="mainController" class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-fullscreen"> 
        @component('components.shared.header')
        @endcomponent

        @component('components.modals.password-reset')
        @endcomponent

        @component('components.modals.sign-up')
        @endcomponent

        @component('components.modals.sign-up-success')
        @endcomponent

        @component('components.modals.sign-in')
        @endcomponent

        <div class="c-layout-page">
            @yield('content')
        </div>

        @component('components.shared.footer')
        @endcomponent

        @component('components.shared.arrow-to-top')
        @endcomponent

        <!--[if lt IE 9]>
        <script src="../../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <script type="text/javascript" src="{{asset('js/build-min.js')}}"></script>
        <script>
        $(document).ready(function() {    
            App.init(); // init core    
        });
        </script>
        <script type="text/javascript" src="{{asset('js/slider-min.js')}}"></script>
        <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
        <script>
            var config = {
                apiKey: "AIzaSyDJ2tMx2N8vrErdm9D77Qukmxx1FI46h8E",
                authDomain: "takengo-41627.firebaseapp.com",
                databaseURL: "https://takengo-41627.firebaseio.com",
                projectId: "takengo-41627",
                storageBucket: "takengo-41627.appspot.com",
                messagingSenderId: "508315576480"
            };
            firebase.initializeApp(config);
        </script>
        <script src="{{ URL::asset('app/lib/angular/angular.min.js')}}"></script>
        <script src="{{ URL::asset('app/app.js')}}"></script>
        <script src="{{ URL::asset('app/controllers/components/modals/sign-in.js')}}"></script>
        <script src="{{ URL::asset('app/controllers/components/modals/sign-up.js')}}"></script>
        <script src="{{ URL::asset('app/controllers/components/header.js')}}"></script>
        @yield('script')
    </body>
</html>
