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
				<h4>Detail Pembayaran</h4>
				<form action="{{ route('order_store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-8 col-md-6">
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Fist Name<span>*</span></p>
										<input type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Last Name<span>*</span></p>
										<input type="text">
									</div>
								</div>
							</div>
							<div class="checkout__input">
								<p>Country<span>*</span></p>
								<input type="text">
							</div>
							<div class="checkout__input">
								<p>Address<span>*</span></p>
								<input type="text" placeholder="Street Address" class="checkout__input__add">
								<input type="text" placeholder="Apartment, suite, unite ect (optinal)">
							</div>
							<div class="checkout__input">
								<p>Town/City<span>*</span></p>
								<input type="text">
							</div>
							<div class="checkout__input">
								<p>Country/State<span>*</span></p>
								<input type="text">
							</div>
							<div class="checkout__input">
								<p>Postcode / ZIP<span>*</span></p>
								<input type="text">
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Phone<span>*</span></p>
										<input type="text">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Email<span>*</span></p>
										<input type="text">
									</div>
								</div>
							</div>
							<div class="checkout__input__checkbox">
								<label for="acc">
									Create an account?
									<input type="checkbox" id="acc">
									<span class="checkmark"></span>
								</label>
							</div>
							<p>Create an account by entering the information below. If you are a returning customer
								please login at the top of the page</p>
							<div class="checkout__input">
								<p>Account Password<span>*</span></p>
								<input type="text">
							</div>
							<div class="checkout__input__checkbox">
								<label for="diff-acc">
									Ship to a different address?
									<input type="checkbox" id="diff-acc">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="checkout__input">
								<p>Order notes<span>*</span></p>
								<input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="checkout__order">
								<h4>Your Order</h4>
								<div class="checkout__order__products">Products <span>Total</span></div>
								<ul>
									<li>Vegetable’s Package <span>$75.99</span></li>
									<li>Fresh Vegetable <span>$151.99</span></li>
									<li>Organic Bananas <span>$53.99</span></li>
								</ul>
								<div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
								<div class="checkout__order__total">Total <span>$750.99</span></div>
								<div class="checkout__input__checkbox">
									<label for="acc-or">
										Create an account?
										<input type="checkbox" id="acc-or">
										<span class="checkmark"></span>
									</label>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
									ut labore et dolore magna aliqua.</p>
								<div class="checkout__input__checkbox">
									<label for="payment">
										Check Payment
										<input type="checkbox" id="payment">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="checkout__input__checkbox">
									<label for="paypal">
										Paypal
										<input type="checkbox" id="paypal">
										<span class="checkmark"></span>
									</label>
								</div>
								<button type="submit" class="site-btn">PLACE ORDER</button>
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
							$('select[name="city_id"]').empty();
							$.each(data, function(key, value) {
								$('select[name="city_id"]').append('<option value="' +
									value.city_id + '" cityName="' + value.type + ' ' +
									value.city_name + '">' + value.type + ' ' + value
									.city_name + '</option>');
							});
						}
					});
				} else {
					$('select[name="city_id"]').empty();
				}
			});

			$('select[name="courier"]').on('change', function() {
				let origin = {{ $city_origin }};
				let destination = $("select[name=city_id]").val();
				let courier = $("select[name=courier]").val();
				let weight = $("input[name=weight]").val();
				if (courier) {
					$.ajax({
						url: "/origin=" + origin + "&destination=" + destination + "&weight=" +
							weight + "&courier=" + courier,
						type: 'GET',
						dataType: 'json',
						success: function(data) {
							$('select[name="layanan"]').empty();
							$('select[name="layanan"]').change(function() {
								var selectedOption = $(this).find('option:selected');
								var ongkir = parseFloat(selectedOption.data('ongkir'));
								var total = parseFloat("{{ Cart::getTotal() }}");
								var sum = ongkir + total;
								$('input[name="service"]').val(selectedOption.data(
									'service'));
								$('input[name="ongkir"]').val(ongkir);
								$('#pengiriman').text('Rp. ' + ongkir.toLocaleString());
								// console.log(ongkir);
								$('#sumResult').text('Rp. ' + sum.toLocaleString());
							});
							$.each(data, function(key, value) {
								$.each(value.costs, function(key1, value1) {
									$.each(value1.cost, function(key2, value2) {
										var service = value1.service;
										var ongkir = value2.value;
										var option = $('<option>')
											.val(key2)
											.text(service + ' | Rp. ' +
												ongkir.toLocaleString())
											.data('service', service)
											.data('ongkir', ongkir);
										$('select[name="layanan"]').append(
											option);
									});
								});
							});
						}
					});
				} else {
					$('select[name="layanan"]').empty();
				}
			});
		});
	</script>
@endpush
