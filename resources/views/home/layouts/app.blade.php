@php
	use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>{{ $title }}</title>

		<meta name="description" content="Ruby Motor Mojosongo, Solo. Grosir Sparepart Motor Solo">

		<meta name="csrf-token" content="{{ csrf_token() }}">

		{{-- Favicon --}}
		<link rel="apple-touch-icon" sizes="180x180"
			href="{{ asset('template_back') }}/assets/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32"
			href="{{ asset('template_back') }}/assets/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16"
			href="{{ asset('template_back') }}/assets/img/favicon/favicon-16x16.png">
		<link rel="manifest" href="{{ asset('template_back') }}/assets/img/favicon/site.webmanifest">
		{{-- end Favicon --}}

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

		{{-- SweetAlert --}}
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- Css Styles -->
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/bootstrap.min.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/font-awesome.min.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/elegant-icons.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/nice-select.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/jquery-ui.min.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/owl.carousel.min.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/slicknav.min.css" type="text/css" />
		<link rel="stylesheet" href="{{ asset('template_front') }}/css/style.css" type="text/css" />
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
	</head>

	<body>
		<!-- Page Preloder -->
		{{-- <div id="preloder">
			<div class="loader"></div>
		</div> --}}
		@php
			$currentUrl = Request::path();
		@endphp
		@include('home.layouts.navbar')
		{{-- @include('home.layouts.hero') --}}
		@if (
			!Request::is('login', 'register', 'keranjang', 'checkout', 'produk', 'tentang') &&
				!Str::startsWith($currentUrl, 'produk/'))
			@include('home.layouts.hero')
		@endif

		@yield('content')
		@stack('modals')
		@include('home.layouts.footer')

		<script src="{{ asset('template_front') }}/js/jquery-3.3.1.min.js"></script>
		<script src="{{ asset('template_front') }}/js/bootstrap.min.js"></script>
		<script src="{{ asset('template_front') }}/js/jquery.nice-select.min.js"></script>
		<script src="{{ asset('template_front') }}/js/jquery-ui.min.js"></script>
		<script src="{{ asset('template_front') }}/js/jquery.slicknav.js"></script>
		<script src="{{ asset('template_front') }}/js/mixitup.min.js"></script>
		<script src="{{ asset('template_front') }}/js/owl.carousel.min.js"></script>
		<script src="{{ asset('template_front') }}/js/main.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

		<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
		<script>
			AOS.init();
		</script>

		<script async defer src="https://buttons.github.io/buttons.js"></script>
		<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
		@stack('scripts')
		@if (session('success'))
			<script>
				Swal.fire({
					icon: 'success',
					title: 'Success!',
					text: '{{ session('success') }}',
				});
			</script>
		@endif
	</body>

</html>
