<html>
	<head>
		<title>Index</title>
	</head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
	<link rel="stylesheet" href="{{ asset('css/style2.css') }}">

	<body>

	   <!-- Menu Bar -->
		<div class="headContainer">
			<div class="left">
				<a href="{{ route('admin.index') }}" id="logo">
					<img src="{{ asset('images/logo.png') }}">
				</a>
				<a class="toggle">
					<i class="fa fa-bars"></i>
				</a>
			</div>
			<div class="right">
				<div id="adminName"> <span class="loginAs">{{$adminName}}</span></div>
				<div>
				<a href="{{ route('admin.index') }}">
					<i class="fa fa-bell"><span class="badge" id="request"></span></i>
				</a>
				</div>
				
				<div id="logout"><a href="{{url('/')}}"> Logout</a></div>
			</div>
		</div>
      <!-- Body -->
		<div>
			@yield('content')
		</div>
	</body>
	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('.toggle').click(function() {
				$('.right').toggleClass('active');
			});
		});
	</script>
	<script>
		// Enable pusher logging - don't include this in production
		// Pusher.logToConsole = true;

		var pusher = new Pusher('1162f7ef967d0e7f88bc', {
			cluster: 'mt1',
			forceTLS: true
		});

		var channel = pusher.subscribe('my-channel');
		channel.bind('form-submitted', function(data) {
			document.getElementById('request').innerHTML = data.notification;
		// alert(data.notification);

		});
	</script>
</html>
