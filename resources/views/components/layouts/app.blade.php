<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <!-- main stylesheet -->
	<link rel="stylesheet" href="{{ asset('main/css/style.css') }}?v={{ time() }}">
	<!-- responsive stylesheet -->
	<link rel="stylesheet" href="{{ asset('main/css/responsive.css') }}?v={{ time() }}">

</head>

<body>
    {{ $slot }}

    <script src="{{asset('main/js/jquery-1.11.3.min.js')}}"></script> <!-- jQuery JS -->
	<script src="{{asset('main/js/bootstrap.min.js')}}"></script> <!-- BootStrap JS -->
	<script src="http://maps.google.com/maps/api/js"></script> <!-- Gmap Helper -->
	<script src="{{asset('main/js/gmap.js')}}"></script> <!-- gmap JS -->
	<script src="{{asset('main/js/wow.js')}}"></script> <!-- WOW JS -->
	<script src="{{asset('main/js/isotope.pkgd.min.js')}}"></script> <!-- iSotope JS -->
	<script src="{{asset('main/js/owl.carousel.min.js')}}"></script> <!-- OWL Carousle JS -->
	<script src="{{asset('main/js/revolution-slider/jquery.themepunch.tools.min.js')}}"></script> <!-- Revolution Slider Tools -->
	<script src="{{asset('main/js/revolution-slider/jquery.themepunch.revolution.min.js')}}"></script> <!-- Revolution Slider -->
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.actions.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.kenburn.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.migration.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.navigation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.parallax.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.slideanims.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('main/js/revolution-slider/extensions/revolution.extension.video.min.js')}}"></script>
	<script src="{{asset('main/js/jquery.fancybox.pack.js')}}"></script> <!-- FancyBox -->
	<script src="{{asset('main/js/validate.js')}}"></script> <!-- Form Validator JS -->
	<script src="{{asset('main/js/jquery.easing.min.js')}}"></script> <!-- jquery easing JS -->
	<script src="{{asset('main/js/jquery.mixitup.min.js')}}"></script> <!-- MixIt UP JS -->
	<script src="{{asset('main/js/custom.js')}}"></script> <!-- Custom JS -->
	<script src="{{asset('main/js/slider.js')}}"></script> <!-- slider JS -->
</body>

</html>