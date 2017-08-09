<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"  >
<!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <title>JANGO | Ultimate Multipurpose Bootstrap HTML Theme - Home Version 14</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        
        <link href="{{asset('css/build.css')}}" rel="stylesheet" type="text/css"/>

        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-fullscreen"> 
        @component('components.shared.header')
        @endcomponent

        @component('components.modals.password-reset')
        @endcomponent

        @component('components.modals.sign-up')
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
        
        @yield('script')
    </body>
</html>