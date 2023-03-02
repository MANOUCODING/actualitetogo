<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') | Togo Actualités</title>
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="/assets/frontend/images/Icone.png">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/frontend/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/assets/frontend/vendor/tiny-slider/tiny-slider.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="/assets/frontend/css/style.css">

    <link href="/assets/admin/css/loader.css" rel="stylesheet">


</head>

<body > 
	
	@include('includes.header')

	@yield('content')

    @include('includes.footer')

	<script src=" {{ asset('js/app.js') }} "></script>
   <!-- =======================
	JS libraries, plugins and custom scripts -->

	<!-- Bootstrap JS -->
	<script src="/assets/frontend/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="/assets/frontend/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="/assets/frontend/vendor/sticky-js/sticky.min.js"></script>
	
	<!-- Template Functions -->
	<script src="/assets/frontend/js/functions.js"></script>

</body>
</html>

</body>
</html>


