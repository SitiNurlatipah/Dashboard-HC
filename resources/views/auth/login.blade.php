<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Management Power Energy</title>
    <meta name="description" content="Management Power Energy is aplication web base" />
    <meta name="keywords" content="admin, admin dashboard" />
    <meta name="author" content="hencework"/>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <!-- vector map CSS -->
    <link href="{{ asset('droopy/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    
    <!-- Custom CSS -->
    <link href="{{ asset('droopy/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
  	<!--Preloader-->
      <div class="preloader-it">
        <div class="la-anim-1"></div>
    </div>
    <!--/Preloader-->
    
    <div class="wrapper  pa-0">
        <header class="sp-header">
            <div class="sp-logo-wrap pull-left">
                <a href="index.html">
                    <img class="brand-img mr-10" src="{{ asset('img/logo.png') }}" alt="brand"/>
                    <span class="brand-text">Droopy</span>
                </a>
            </div>
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">Don't have an account?</span>
                <a class="inline-block btn btn-success  btn-rounded btn-outline" href="signup.html">Sign Up</a>
            </div>
            <div class="clearfix"></div>
        </header>
        
        <!-- Main Content -->
        <div class="page-wrapper pa-0 ma-0 auth-page">
            <div class="container-fluid">
                <!-- Row -->
                <div class="table-struct full-width full-height">
                    <div class="table-cell vertical-align-middle auth-form-wrap">
                        <div class="auth-form  ml-auto mr-auto no-float">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="mb-30">
                                        <h3 class="text-center txt-dark mb-10">Sign in to Droopy</h3>
                                        <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6>
                                    </div>	
                                    <div class="form-wrap">
                                        @if ($message = Session::get('failed'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Perhatian !</h4>
    <div class="alert-body">
        {{ $message }}
    </div>
    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
</div>
@endif
                                        <form action="{{ route('login.post') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
                                                <input type="text" class="form-control" required="" name="txtUsername" id="txtUsername" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10" for="txtPassword">Password</label>
                                                {{-- <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="{{ route('register') }}">Cannot Have Account ?</a>
                                                <div class="clearfix"></div> --}}
                                                <input type="password" class="form-control" required="" name="txtPassword" id="txtPassword" placeholder="Enter Password">
                                            </div>
                                            {{-- <div class="form-group">
                                                <div class="checkbox checkbox-primary pr-10 pull-left">
                                                    <input id="checkbox_2" required="" type="checkbox">
                                                    <label for="checkbox_2"> Keep me logged in</label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> --}}
                                            <div class="form-group text-center">
                                                <button class="btn btn-success btn-rounded">sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->	
            </div>
            
        </div>
        <!-- /Main Content -->
    
    </div>
    <!-- /#wrapper -->
    
    <!-- JavaScript -->
    
    <!-- jQuery -->
    <script src="{{ asset('droopy/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('droopy/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('droopy/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js') }}"></script>
    
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('droopy/dist/js/jquery.slimscroll.js') }}"></script>
    
    <!-- Init JavaScript -->
    <script src="{{ asset('droopy/dist/js/init.js') }}"></script>
</body>
<!-- END: Body-->

</html>