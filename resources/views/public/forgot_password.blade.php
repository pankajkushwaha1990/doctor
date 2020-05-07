<!DOCTYPE html> 
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
<head>
        <meta charset="utf-8">
        <title>aasanilaz</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        
        <!-- Favicons -->
        <link href="{{asset('template')}}/assets/img/favicon.png" rel="icon">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap.min.css">
        
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/all.min.css">
        
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">
        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    
    </head>
    <body class="account-page">

        <!-- Main Wrapper -->
        <div class="main-wrapper">
        
            <!-- Header -->
             @include('public/header')
            <!-- /Header -->
            
            <!-- Page Content -->
            <div class="content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            
                            <!-- Account Content -->
                            <div class="account-content">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-md-7 col-lg-6 login-left">
                                        <img src="{{asset('template')}}/assets/img/login-banner.png" class="img-fluid" alt="Login Banner">    
                                    </div>
                                    <div class="col-md-12 col-lg-6 login-right">
                                        <div class="login-header">
                                            <h3>Forgot Password?</h3>
                                            <p class="small text-muted">Enter your mobile to reset password</p>
                                        </div>
                                        
                                        <!-- Forgot Password Form -->
                                       <form id="needs-validation" novalidate class="needs-validation" role="form" enctype="multipart/form-data" method="post" action="{{ url('forget_password_submit') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="form-group form-focus">
                                                 <input type="text" name="mobile" class="form-control floating" maxlength="10" minlength="10" min='1111111111' max='9999999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" required="">
                                                <label class="focus-label">Mobile (+91)</label>
                                                @if ($errors->has('mobile')) <p style="color:red;">{{ $errors->first('mobile') }}</p> @endif
                                            </div>
                                            <div class="text-right">
                                                <a class="forgot-link" href="{{ url('login') }}">Remember your password?</a>
                                            </div>
                                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Reset Password</button>
                                        </form>
                                        <!-- /Forgot Password Form -->
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /Account Content -->
                            
                        </div>
                    </div>

                </div>

            </div>      
            <!-- /Page Content -->
   
            <!-- Footer -->
             @include('public/footer')
            <!-- /Footer -->
           
        </div>
        <!-- /Main Wrapper -->
      
        <!-- jQuery -->
        <script src="{{asset('template')}}/assets/js/jquery.min.js"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{asset('template')}}/assets/js/popper.min.js"></script>
        <script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
        
        <!-- Custom JS -->
        <script src="{{asset('template')}}/assets/js/script.js"></script>
        <script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>
        
        
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
</html>