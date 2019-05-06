
@if (session('id_perusahaan')=='')
	<script>
		window.location.href="{{ url('') }}";
	</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>@yield('title') </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="{{ asset('public/assets/img/logo.png') }}" rel="icon">
	<link href="{{ asset('public/assets/img/logo.png') }}" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="{{ asset('public/assets/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="{{ asset('public/assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/lib/animate/animate.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('public/assets/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/') }}assets/lib/data-table/data-table.css" rel="stylesheet">
    <link href="{{ asset('public/assets/core.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/templates.css') }}" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>
<style type="text/css">
	  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
  }
</style>
<body id="body">

  <!--==========================
    Top Bar
    ============================-->
    <section id="topbar" class="d-none d-lg-block">
    	<div class="container clearfix">
    		<div class="contact-info float-left">
    			<i class="fa fa-envelope-o" style="color: #ad1948"></i> <a href="mailto:contact@example.com">contact@example.com</a>
    			<i class="fa fa-phone" style="color: #ad1948"></i> (62-21) 1500 636
    		</div>
    		<div class="social-links float-right">
    			<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
    			<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
    			<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
    			<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
    			<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
    		</div>
    	</div>
    </section>

  <!--==========================
    Header
    ============================-->
    <header id="header">
    	<div class="container">

    		<div id="logo" class="pull-left">
    			<h1><a href="#body" class="scrollto"><img src="{{asset('public/assets/img/logo.png')}}" style="width: 100px" alt=""><span style="color: #ad1948"></span></a></h1>
    			<!-- Uncomment below if you prefer to use an image logo -->
    			<!-- <a href="#body"><img src="{{asset('public/assets/img/logo.png')}}" alt="" title="" /></a>-->
    		</div>

    		<nav id="nav-menu-container">
    			<ul class="nav-menu">
    				<li class="menu-active"><a href="{{ url('dashboard-vendor') }}">Home</a></li>
    				<li class="menu"><a href="{{ url('registrasi-produk') }}">Registrasi Produk</a></li>  
    				<li class="menu"><a href="{{ url('penawaran') }}">Penawaran</a></li>
    				<!-- <li class="menu"><a href="assignment-management-admin.html">Pengaturan Proyek</a></li> -->
    				<li class="menu"><a href="{{ url('kontrak') }}">Kontrak</a></li>
    				<li class="menu"><a href="{{ url('pengiriman') }}">Pengiriman</a></li>
    				<li class="menu"><a href="{{ url('penagihan') }}">Penagihan</a></li>
    			</li>
    			<li class="menu-has-children"><a  class="twitter"><img src="{{asset('public/assets/img/29.jpg')}}" style="width: 50px;margin-top: -10px; border-radius: 50px; background-size: cover;" alt="" title="Employee Names"><p class="name">Ahmad Soebardjo</p></a>
    				<ul style="">
    					<li><a href="profile-admin.html" class="twitter"><i class="fa   fa-gears "></i>  Company Setting</a></li>
    					<li><a href="{{ url('logout') }}" class="twitter"><i class="fa  fa-sign-out"></i>  Logout</a></li>
    				</ul>
    			</li>

    		</ul>
    	</nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->
<!-- #intro -->

<main id="main">
	@yield('content')
</main>

  <!--==========================
    Footer
    ============================-->
    <footer id="footer">
    	<div class="container">
    		<div class="col-lg-12" style="padding-top: 30px;">
    			<div class="row">
    				<div class="col-lg-6" >
    					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d479316.28317795985!2d106.61280389971239!3d-6.387504753723039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb413e8d0488fcbfe!2sPT.+Adhimix+Precast+Indonesia!5e0!3m2!1sid!2sid!4v1533797298611" frameborder="0" style="border:0; width: 100%; height: 360px;" allowfullscreen></iframe> 
    				</div>
    				<div class="col-lg-6" style="padding-top: 50px;"> 
    					<div class="row">
    						<div class="col-sm-6">
    							<h2 class="header2">OFFICE</h2>
    							<p>Graha Anugerah 3rd Floor Jl. Raya Ps. Minggu No. 17 A Pancoran Jakarta Selatan 12780 - Indonesia</p>
    						</div>
    						<div class="col-sm-6">
    							<h2 class="header2">CONTACT</h2>
    							<p>Phone. (62-21) 1500.636 | Fax. (62-21) 799.1666</p>
    						</div>
    					</div>
    					<div class="row">
    						<div class="col-sm-6">
    							<h2 class="header2">CALL CENTER</h2>
    							<p>Call Center : (62-21) 1500.636</p>
    						</div>
    						<div class="col-sm-6">
    							<h2 class="header2">MEDIA SOCIAL</h2>
    							<a  href="#" class="twitter"><i style="width: 50px;" class="fa fa-twitter"></i></a>
    							<a  href="#" class="facebook"><i style="width: 50px;" class="fa fa-facebook"></i></a>
    							<a  href="#" class="instagram"><i style="width: 50px;" class="fa fa-instagram"></i></a>
    							<a  href="#" class="google-plus"><i style="width: 50px;" class="fa fa-google-plus"></i></a>
    						</div>
    					</div>

    				</div>
    			</div>
    		</div>
    	</div>
    </footer><!-- #footer -->


    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="{{asset('public/assets/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{asset('public/assets/lib/superfish/superfish.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/magnific-popup/magnific-popup.min.js')}}"></script>
    <script src="{{asset('public/assets/lib/sticky/sticky.js')}}"></script>
    <script src="{{asset('public/assets/https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY')}}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ asset('public/assets/lib/data-table/data-tale.js') }}"></script>

    <script src="{{asset('public/assets/contactform/contactform.js')}}"></script>
    <script src="{{ asset('public/assets/js/sweetalert.js') }}"></script>

    @if (session('success')!==null)
    <script>
    	swal('Sukses','{{ session('success') }}','success')
    </script>
    @endif

    @if (session('error')!==null)
    <script>
    	swal('Gagal','{{ session('error') }}','error')
    </script>
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $element)
    <script>
    	swal('Gagal','{{ $element }}','error')
    </script>
    @endforeach
    @endif

    <!-- Template Main Javascript File -->
    <script src="{{asset('public/assets/js/main.js')}}"></script>
    <script>
    	function show(){
    		if($("#muncul").hasClass('hide')){
    			$("#muncul").removeClass('hide');
    		}else{
    			$("#muncul").addClass('hide');
    		}
    	}
    </script>
</body>
</html>