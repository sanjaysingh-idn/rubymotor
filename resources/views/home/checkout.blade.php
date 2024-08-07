@extends('home.layouts.app')

@section('content')
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Checkout</li>
		</ol>

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class=" mt-5">
					<h2><strong>Halaman Checkout</strong></h2>
					<p class="my-2">Periksa kembali keranjang ada sebelum melanjutkan ke halaman checkout</p>
					<p class="my-2 text-warning">Ini adalah halaman terakhir sebelum melanjutkan ke halamanan pembayaran</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Checkout Section Begin -->
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<h4>Detail Penerima</h4>
				<form action="{{ route('order_store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="row">
								<div class="col-lg-12">
									<div class="checkout__input">
										<p>Nama Penerima<span>*</span></p>
										<input type="text" id="name" name="name" value="{{ Auth()->user()->name }}" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>No. HP / Whatsapp<span>*</span></p>
										<input type="number" id="contact" name="contact" value="{{ Auth()->user()->contact }}" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Email<span>*</span></p>
										<input type="text" id="email" name="email" value="{{ Auth()->user()->email }}" required>
									</div>
								</div>
							</div>
							<h4>Pengiriman</h4>

							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Provinsi<span>*</span></p>
										<select class="provinsi-tujuan" id="province_id" name="province_id" required>
											<option value="" hidden>--Pilih Provinsi--</option>
											@foreach ($provinces as $item)
												<option value="{{ $item['province_id'] }}" getProvince="{{ $item['province'] }}">{{ $item['province'] }}
												</option>
											@endforeach
										</select>
										<input type="hidden" class="form-control" id="province_name" nama="province_name"
											placeholder="ini untuk menangkap nama provinsi ">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Kota / Kabupaten<span>*</span></p>
										<select id="city_id" name="city_id" required>
											<option value="" hidden>--Pilih Kota/Kabupaten--</option>
										</select>
										<input type="hidden" class="form-control" id="cityName" nama="cityName"
											placeholder="ini untuk menangkap nama kota ">
									</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Ekspedisi<span>*</span></p>
										<select name="courier" id="courier" required>
											<option value="" hidden>--Pilih Ekspedisi--</option>
											<option value="jne">JNE</option>
											<option value="tiki">TIKI</option>
											<option value="pos">POS INDONESIA</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Layanan<span>*</span></p>
										<select name="layanan" id="layanan" required>
											<option value="">--Pilih Layanan--</option>
										</select>
									</div>
								</div>
								<input type="hidden" class="form-control" id="service" name="service">
								<input type="hidden" class="form-control" id="ongkir" name="ongkir">
							</div>
							<br>
							<div class="checkout__input">
								<p>Alamat Lengkap<span>*</span></p>
								<input type="text" id="address" name="address" required>
							</div>
							<div class="checkout__input">
								<p>Kode Pos<span>*</span></p>
								<input type="text" id="pos_code" name="pos_code" required>
							</div>
							{{-- <div class="checkout__input">
								<p>Catatan Pengiriman<span>*</span></p>
								<input type="text" id="catatan" name="catatan" required>
							</div> --}}
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="checkout__order">
								<h4>Daftar Pesanan</h4>
								<div class="checkout__order__products">Produk ({{ Cart::getTotalQuantity() }} Item) <span>Total</span></div>
								<ul>
									@php
										$subtotalBerat = 0;
									@endphp
									@foreach ($cartItems as $item)
										<li>{{ $item->name }} <span>Rp. {{ number_format($item->price) }}</span></li>
										@php
											$berat = $item->attributes->berat * $item->quantity;
											$subtotalBerat += $berat;
										@endphp
									@endforeach
								</ul>
								<input type="hidden" value="{{ $subtotalBerat }}" id="weight" name="weight">
								<div class="checkout__order__subtotal">Ongkir <span id="pengiriman">Rp. 0</span></div>
								<div class="checkout__order__total">Total <span id="sumResult">Rp.
										{{ number_format(Cart::getTotal()) }}</span></div>
								<p>Setelah ini anda akan diarahkan untuk proses Pembayaran</p>
								<button type="submit" class="site-btn">Beli Sekarang</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!-- Checkout Section End -->
@endsection

@push('scripts')
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			$('select[name="province_id"]').on('change', function() {
				let getProvince = $("#province_id option:selected").attr("getProvince");
				$("#province_name").val(getProvince);
				let provinceId = $(this).val();

				if (provinceId) {
					$.ajax({
						url: '/city/' + provinceId,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							// console.log('Cities data:', data); // For debugging

							$.each(data, function(key, value) {
								$('select[name="city_id"]').append('<option value="' +
									value.city_id + '" cityName="' + value.type + ' ' +
									value.city_name + '">' + value.type + ' ' + value
									.city_name + '</option>');
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.error('AJAX error:', textStatus, errorThrown);
						}
					});
				} else {
					$('#city_id').empty();
					$('#city_id').append('<option value="" hidden>--Pilih Kota/Kabupaten--</option>');
				}
			});

			$('select[name="city_id"]').on('change', function() {
				var selectedOption = $(this).find('option:selected');
				$('#cityName').val(selectedOption.text()); // Set the hidden input with the selected city name
			});

			$('select[name="courier"]').on('change', function() {
				let origin = {{ $city_origin }};
				let destination = $("select[name=city_id]").val();
				let courier = $("select[name=courier]").val();
				let weight = $("input[name=weight]").val();
				if (courier && destination) {
					$.ajax({
						url: "/origin=" + origin + "&destination=" + destination + "&weight=" +
							weight + "&courier=" + courier,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							$('select[name="layanan"]').empty();
							$('select[name="layanan"]').append(
								'<option value="" hidden>--Pilih Layanan--</option>'
							); // Default option

							$.each(data, function(key, value) {
								$.each(value.costs, function(key1, value1) {
									$.each(value1.cost, function(key2, value2) {
										var service = value1.service;
										var ongkir = value2.value;
										var option = $('<option>')
											.val(service)
											.text(service + ' | Rp. ' +
												ongkir.toLocaleString())
											.data('service', service)
											.data('ongkir', ongkir);
										$('select[name="layanan"]').append(
											option);
									});
								});
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.error('AJAX error:', textStatus, errorThrown);
						}
					});
				} else {
					$('select[name="layanan"]').empty();
				}
			});

			// Handle layanan change
			$('select[name="layanan"]').on('change', function() {
				var selectedOption = $(this).find('option:selected');
				var ongkir = parseFloat(selectedOption.data('ongkir'));
				var total = parseFloat("{{ Cart::getTotal() }}");
				var sum = ongkir + total;

				// Update hidden inputs
				$('input[name="service"]').val(selectedOption.data('service'));
				$('input[name="ongkir"]').val(ongkir);

				// Update the display
				$('#pengiriman').text('Rp. ' + ongkir.toLocaleString());
				$('#sumResult').text('Rp. ' + sum.toLocaleString());
			});
		});
	</script>
@endpush
