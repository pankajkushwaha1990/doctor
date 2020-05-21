<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="{{asset('template')}}/assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">  
     @yield('styles')
  </head>
  <body>
    <div class="main-wrapper">
      @include('patient_partials.navbar')
      @include('patient_partials.sidebar')
      @yield('content')
      @include('patient_partials.footer')
    </div>

    <script src="{{asset('template')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('template')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    @yield('scripts')
    <script src="{{asset('template')}}/assets/js/script.js"></script> 
    <script type="text/javascript">
      var path = window.location.pathname;
      $('.dashboard-menu ul li').removeClass('active');
      $('.dashboard-menu ul li a').each( function( index, element ){
          var href = $( this ).attr('href');
          if(href.indexOf(path) !== -1){
            $(this).parent().addClass('active');
          }else{
            $(this).parent().addClass('');
          }
      });
 
    </script>
  </body>
</html>   
