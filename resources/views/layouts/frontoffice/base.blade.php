<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') | Togo actualités</title>
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="/assets/images/Icone.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/font-awesome/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/tiny-slider/tiny-slider.css')}}">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5594963864359932"
     crossorigin="anonymous"></script>

</head>

<body > 
	
	@include('includes.frontoffice.header')

	@yield('content')

    @include('includes.frontoffice.footer')

	<script src=" {{ asset('js/app.js') }} "></script>

	
   <!-- =======================
	JS libraries, plugins and custom scripts -->

	<!-- Bootstrap JS -->
	<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

	<!-- Vendors -->
	<script src="{{asset('assets/vendor/tiny-slider/tiny-slider.js')}}"></script>
	<script src="{{asset('assets/vendor/sticky-js/sticky.min.js')}}"></script>
	
	<!-- Template Functions -->
	<script src="{{asset('assets/js/functions.js')}}"></script>

</body>
</html>

</body>
</html>


