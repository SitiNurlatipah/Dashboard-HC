<!DOCTYPE html>

<html class="loading semi-dark-layout" lang="en" data-textdirection="ltr">

<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>@yield('title')</title>
  <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/kalbe.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('include.style')
</head>

<body>
  <!-- Preloader -->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>  
  <!-- /Preloader -->
  <div class="wrapper theme-2-active pimary-color-green">
    @include('include.header')
    @include('include.sidebar')
    
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop">
    </div>
		<!-- /Right Sidebar Backdrop -->
      <div class="page-wrapper">
        <div class="container-fluid page-body-wrapper">
          @yield('content')
          @include('include.alert')
          @include('include.style')
        </div>
          @include('include.footer')
      </div>
  </div>

  @include('include.script')
</body>

</html>
