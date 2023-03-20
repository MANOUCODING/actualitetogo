<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title') | Togo actualités</title>
	

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/assets/images/Icone.png">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/tiny-slider/tiny-slider.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/glightbox/css/glightbox.css">
	<link rel="stylesheet" type="text/css" href="/assets/vendor/plyr/plyr.css">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<link id="style-switch" rel="stylesheet" type="text/css" href="/assets/css/loader.css">

</head>

<body > 
	
	@include('includes.frontoffice.header')

	@yield('content')

    @include('includes.frontoffice.footer')

	<script src=" {{ asset('js/app.js') }} "></script>

	<!-- Back to top -->
	<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

	<!-- =======================
	JS libraries, plugins and custom scripts -->

	<!-- Bootstrap JS -->
	<script src="/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vendors -->
	<script src="/assets/vendor/tiny-slider/tiny-slider.js"></script>
	<script src="/assets/vendor/sticky-js/sticky.min.js"></script>
	<script src="/assets/vendor/glightbox/js/glightbox.js"></script>
	<script src="/assets/vendor/plyr/plyr.js"></script>

	<!-- Template Functions -->
	<script src="/assets/js/functions.js"></script>

</body>
</html>


