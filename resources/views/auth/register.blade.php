<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>register</title>
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
                    <span class="brand-text">HUMAN CAPITAL</span>
                </a>
            </div>
            <div class="form-group mb-0 pull-right">
                <span class="inline-block pr-10">Sudah memiliki akun?</span>
                <a class="inline-block btn btn-success  btn-rounded btn-outline" href="{{ route('login') }}">Sign In</a>
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
                                        <h3 class="text-center txt-dark mb-10">REGISTRASI AKUN</h3>
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
                                    @if(session()->has('message'))
                                    <div class="alert alert-danger alert-dismissable mt-10 pb-5 pt-5">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>{{ session()->get('message') }} 
                                    </div>
                                    @endif
                                        <form action="{{ route('register.post') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Fullname</label>
                                                <input type="text" class="form-control" required="" name="namalengkap" id="txtFullname" placeholder="Enter fullname">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
                                                <input type="text" class="form-control" required="" name="username" id="txtUsername" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label class="pull-left control-label mb-10" for="txtPassword">Password</label>
                                                
                                                <input type="password" class="form-control" required="" name="password" id="" placeholder="Enter Password">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Role</label>
                                                <select name="role" id="" class="form-control">
                                                    <option value="Admin">Administrator</option>
                                                    <option value="HC">Admin HC</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-10" for="exampleInputEmail_2">Foto</label>
                                                <input type="file" class="file-upload upload" required="" name="foto" id="" placeholder="">
                                            </div>
                                            {{-- <div class="form-group">
                                                <div class="checkbox checkbox-primary pr-10 pull-left">
                                                    <input id="checkbox_2" required="" type="checkbox">
                                                    <label for="checkbox_2"> Keep me logged in</label>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div> --}}
                                            <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="{{ route('login') }}">sudah memiliki akun?</a>
                                                <div class="clearfix"></div>
                                            <div class="form-group text-center">
                                                <button class="btn btn-success btn-rounded">Sign Up</button>
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