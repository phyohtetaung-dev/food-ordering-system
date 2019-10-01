<html>
	<head>
		<title>Index</title>
	</head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

	<body>

	   <!-- Menu Bar -->
		<div class="headContainer">
			<div class="left">
				<a href="{{url('menu/home/')}}" id="logo">
					<img src="{{ asset('images/logo.png') }}">
				</a>
				<a class="toggle">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="right">
				<div><a href="{{url('/menu/home')}}"> Home</a></div>
				<div><a href="{{url('/menu/show-menu')}}"> Menus</a></div>
				<div><a href="{{url('/menu/contact')}}"> Contact Us</a></div>
				<div><a href="{{url('/menu/about')}}"> About Us</a></div>
				<div id="item">
					<a href="{{route('menu.viewCart')}}">
						<i class="fa fa-shopping-cart"></i>
						<i class="badge cartQty"> {{ Session::has('cart') ? Session::get('cart') -> totalQty : 0 }}</i>
						Items
					</a>
				</div>
				<div><a href="{{url('/user/user-logout')}}"> Logout</a></div>
			</div>
		</div>
      <!-- Body -->
		<div class="wrap">
			@yield('content')
			<div class="footer">
				<!-- header -->
				<h1>Site Links</h1>
				
				<div class="footerItemsWrap">
					<div class="footerItems">
						<a href="{{url('/menu/contact')}}">Contact Us</a>
						<a href="{{url('/menu/about')}}">About Us</a>
						<a href="#">Directions</a>
						<a href="#">Blog</a>
					</div>
					<div class="footerItems">
						<a href="#">Promotions</a>
						<a href="#">Partner</a>
						<a href="#">Careers</a>
						<a href="#">FAQs</a>
					</div>
					<div class="footerItems">
						<a href="#">Features</a>
						<a href="#">Privacy Policy</a>
						<a href="#">Terms & Conditions</a>
					</div>
				</div>
				
				<!-- line -->
				<hr style="background-color: rgba(0, 0, 0, 0.7)">
				
				<div class="footerItemsWrap">
				<div class="copyRight">
						<span href="#" class="fa fa-copyright"> 2019 All rights reserved.</span>
					</div>
					<div class="followUs">
						<h1>Follow Us</h1>
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-google"></a>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ URL::to('js/validation.js') }}"></script>
	<script>
		AOS.init();
		$(document).ready(function() {
			$('.toggle').click(function() {
				$('.right').toggleClass('active');
			});
		});
	</script>
	
	@yield('script')
	
</html>
