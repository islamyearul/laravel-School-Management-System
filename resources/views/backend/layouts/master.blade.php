<!DOCTYPE html>
<html lang="en">
  <head>
    @include('backend/layouts/head')
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar -->
    @include('backend/layouts/header')
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('backend/layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->


		@yield('title')
		@yield('dashboard')
		@yield('profile')




        
		<!-- /.content -->
	  </div>
  </div>

  <!--Footer -->
  @include('backend/layouts/footer-content')


   <!--control-sidebar -->
  @include('backend/layouts/control-sidebar')
   <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
@include('backend/layouts/footer')

	
	
</body>
</html>
