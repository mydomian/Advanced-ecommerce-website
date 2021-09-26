<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.front_layout.front_header')
</head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
    <div class="span6">Welcome!<strong> User</strong></div>
    <div class="span6">
        <div class="pull-right">
            <a href="product_summary.html"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ 3 ] Items in your cart </span> </a>
        </div>
    </div>
</div>
<!-- Navbar ================================================== -->
<section id="navbar">
    @include('layouts.front_layout.front_navbar')
</section>
</div>
</div>
<!-- Header End====================================================================== -->

{{--banner--}}
@if(isset($page_name) && $page_name == "index")
   @include("layouts.front_layout.front_banner")
@endif
{{--end banner--}}
<div id="mainBody">
<div class="container">
<div class="row">
    <!-- Sidebar ================================================== -->
    @include('layouts.front_layout.front_sidebar')
    <!-- Sidebar end=============================================== -->
    @yield('content')
</div>
</div>
</div>
<!-- Footer ================================================================== -->
@include('layouts.front_layout.front_footer')
<!-- Placed at the end of the document so the pages load faster ============================================= -->
{{--script--}}
@include('layouts.front_layout.footer_script')
{{--end script--}}
</body>
</html>
