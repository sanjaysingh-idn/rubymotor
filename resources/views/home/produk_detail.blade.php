@extends('home.layouts.app')

@section('content')
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/">Home</a></li>
			<li class="breadcrumb-item"><a href="/produk">Produk</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $produk->name }}</li>
		</ol>
	</div>
	<!-- Product Details Section Begin -->
	<section class="product-details spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="product__details__pic">
						<div class="product__details__pic__item">
							<img class="product__details__pic__item--large" src="{{ asset('storage/' . $produk->image) }}" alt="">
						</div>
						<div class="product__details__pic__slider owl-carousel">
							@foreach ($produk->foto as $item)
								<img data-imgbigurl="{{ asset('storage/' . $item->image) }}" src="{{ asset('storage/' . $item->image) }}"
									alt="">
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="product__details__text">
						<h3>{{ $produk->name }}</h3>

						<div class="product__details__price mt-5 mb-5">
							@if ($produk->harga_diskon)
								Rp. {{ number_format($produk->harga_diskon) }}
								<small class="text-black-50" style="text-decoration-line: line-through">Rp.
									{{ number_format($produk->harga) }}</small>
								<small class="badge rounded-pill text-white bg-danger">{{ $produk->diskon }} %</small>
							@else
								Rp. {{ number_format($produk->harga) }}
							@endif
						</div>

						<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" value="{{ $produk->id }}" name="id">

							<div class="product__details__quantity">
								<div class="quantity">
									<div class="pro-qty">
										<input type="number" name="qty" value="1" min="1" required>
									</div>
								</div>
							</div>
							<button type="submit" class="primary-btn mt-3"><i class="fa fa-cart-plus"></i> ADD TO CART</button>
						</form>

						<ul class="mt-3">
							<li><b>Kategori</b> <span><a href="#">{{ $produk->kat->name }}</a></span></li>
							<li><b>Stok</b> <span>{{ $produk->stok }}</span></li>
							<li><b>Berat</b> <span>{{ $produk->berat }} kg</span></li>
							<li><b>Deskripsi</b>
								<span>
									<br>
									{!! $produk->desc !!}
								</span>
							</li>
						</ul>
					</div>
				</div>

				{{-- <div class="col-lg-12">
					<div class="product__details__tab">
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<div class="product__details__tab__desc">
									<h6>Deskripsi</h6>
									{!! $produk->desc !!}
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</div>
		</div>
	</section>
	<!-- Product Details Section End -->
@endsection

@push('scripts')
	<script>
		function previewImg(element) {
			var imageBox = document.getElementById('imageBox');
			imageBox.src = element.src;
		}

		function attachEventListeners() {
			var previewImages = document.querySelectorAll('.preview-img');
			previewImages.forEach(function(image) {
				image.addEventListener('click', function() {
					previewImg(this);
				});
				image.addEventListener('touchstart', function() {
					previewImg(this);
				});
			});
		}

		// Call the attachEventListeners function when the page has finished loading
		window.addEventListener('load', function() {
			attachEventListeners();
		});
	</script>
@endpush
