<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="{{asset('template/admin')}}/assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/style.css">
    <style type="text/css">
      @media screen and (max-width: 849px) {

.div-no-mobile {
    visibility: hidden;
}

.div-only-mobile {
    visibility: visible;
    display: block;
}

}
    </style>
     @yield('styles')
    </head>
<body> 
    <div class="main-wrapper">
      @include('partials.navbar')
      @include('partials.sidebar')
      @yield('content')
      @include('partials.footer')
   </div>
   <script src="{{asset('template/admin')}}/assets/js/jquery-3.2.1.min.js"></script>
   <script src="{{asset('template/admin')}}/assets/js/popper.min.js"></script>
   <script src="{{asset('template/admin')}}/assets/js/bootstrap.min.js"></script>
   <script src="{{asset('template/admin')}}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="{{asset('template/admin')}}/assets/plugins/raphael/raphael.min.js"></script>    
   @yield('scripts')
</body>
</html>