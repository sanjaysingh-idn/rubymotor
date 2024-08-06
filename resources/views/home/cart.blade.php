@extends('home.layouts.app')

@section('content')
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Keranjang</li>
		</ol>

		<div class="row">
			<div class="col-lg-12 text-center">
				<div class=" mt-5">
					<h2><strong>Halaman Keranjang</strong></h2>
				</div>
			</div>
		</div>
	</div>
	<!-- Shoping Cart Section Begin -->
	<section class="shoping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shoping__cart__table">
						<table>
							<thead>
								<tr>
									<th class="shoping__product">Produk ({{ Cart::getTotalQuantity() }} Item)</th>
									<th>Harga</th>
									<th>Quantity</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($cartItems as $item)
									<tr>
										<td class="shoping__cart__item">
											<img src="{{ asset('storage/' . $item->attributes->image) }}" alt="">
											<h5>{{ $item->name }}</h5>
										</td>
										<td class="shoping__cart__price">
											Rp. {{ number_format($item->price) }}
										</td>
										<td class="shoping__cart__quantity">
											{{ $item->quantity }}
										</td>
										<td class="shoping__cart__total">
											Rp. {{ number_format(Cart::get($item->id)->getPriceSum()) }}
										</td>
										<td class="shoping__cart__item__close">
											<span class="icon_close"></span>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="shoping__cart__btns">
						@if (!$cartItems->isEmpty())
							<form action="{{ route('cart.clear') }}" method="POST">
								@csrf
								<button class="btn btn-danger mb-2" data-mdb-toggle="tooltip" title="Bersihkan Keranjang">
									<i class="fa fa-trash me-2"></i>
									Bersihkan Keranjang
								</button>
							</form>
						@endif
					</div>
				</div>
				<div class="col-lg-6">
					<div class="shoping__checkout">
						<h5>Cart Total</h5>
						<ul>
							<li>Total <span>Rp. {{ number_format(Cart::getTotal()) }}</span></li>
						</ul>
						@if (Auth::check())
							<p>Silahkan lanjut ke halaman checkout untuk menghitung biaya pengiriman</p>
							@if (Cart::getTotal() > 0)
								<a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
							@endif
						@else
							<p><a href="/register">Daftar</a> / <a href="/login">Login</a>, untuk melanjutkan ke halaman checkout</p>
						@endif
						{{-- <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a> --}}
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Shoping Cart Section End -->
@endsection
