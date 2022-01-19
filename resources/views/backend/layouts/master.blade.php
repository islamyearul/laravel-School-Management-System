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

      <!-- Breadcamp (Page header) -->
    <div class="content-header">
      <div class="d-flex align-items-center">
          <div class="mr-auto">
              <h3 class="page-title">{{ ucwords(collect(request()->segments())->last())}}</h3>
              <div class="d-inline-block align-items-center">
                  <a href="/"><i class="mdi mdi-home-outline"></i></a> >
                  <?php $link = ''; ?>
                  @for ($i = 1; $i <= count(Request::segments()); $i++)
                      @if (($i < count(Request::segments())) & ($i> 0))
                          <?php $link .= '/' . Request::segment($i); ?>
                          <a href="<?= $link ?>">{{ ucwords(str_replace('-', ' ', Request::segment($i))) }}</a> >
                      @else {{ ucwords(str_replace('-', ' ', Request::segment($i))) }}
                  @endif
                  @endfor
              </div>
          </div>
      </div>
  </div>
		<!-- Main content -->


		@yield('title')
		@yield('dashboard')
		@yield('users')
		@yield('add-user')
		@yield('edit-user')

    {{-- Group --}}
    @yield('group')
    @yield('add-group')
    @yield('edit-group')

    {{-- Class --}}
    @yield('class')
    @yield('add-class')
    @yield('edit-class')

    {{-- Year --}}
    @yield('year')
    @yield('add-year')
    @yield('edit-year')




        
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
