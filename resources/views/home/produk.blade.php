@extends('home.layouts.app')

@section('content')
	<!-- Product Section Begin -->
	<section class="product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-5">
					<div class="sidebar">
						<div class="sidebar__item border border-primary p-3" style="background-color: #004aad">
							<h4 class="text-white">Kategori</h4>
							<ul>
								@foreach ($kategori as $k)
									<li><a href="#" class="text-white">{{ $k->name }}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar__item">
							<h4>Harga</h4>
							<div class="price-range-wrap">
								<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="1000"
									data-max="10000000">
									<div class="ui-slider-range ui-corner-all ui-widget-header"></div>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
									<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
								</div>
								<div class="range-slider">
									<div class="price-input">
										<input type="text" id="minamount">
										<input type="text" id="maxamount">
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="sidebar__item sidebar__item__color--option">
							<h4>Colors</h4>
							<div class="sidebar__item__color sidebar__item__color--white">
								<label for="white">
									White
									<input type="radio" id="white">
								</label>
							</div>
							<div class="sidebar__item__color sidebar__item__color--gray">
								<label for="gray">
									Gray
									<input type="radio" id="gray">
								</label>
							</div>
							<div class="sidebar__item__color sidebar__item__color--red">
								<label for="red">
									Red
									<input type="radio" id="red">
								</label>
							</div>
							<div class="sidebar__item__color sidebar__item__color--black">
								<label for="black">
									Black
									<input type="radio" id="black">
								</label>
							</div>
							<div class="sidebar__item__color sidebar__item__color--blue">
								<label for="blue">
									Blue
									<input type="radio" id="blue">
								</label>
							</div>
							<div class="sidebar__item__color sidebar__item__color--green">
								<label for="green">
									Green
									<input type="radio" id="green">
								</label>
							</div>
						</div>
						<div class="sidebar__item">
							<h4>Popular Size</h4>
							<div class="sidebar__item__size">
								<label for="large">
									Large
									<input type="radio" id="large">
								</label>
							</div>
							<div class="sidebar__item__size">
								<label for="medium">
									Medium
									<input type="radio" id="medium">
								</label>
							</div>
							<div class="sidebar__item__size">
								<label for="small">
									Small
									<input type="radio" id="small">
								</label>
							</div>
							<div class="sidebar__item__size">
								<label for="tiny">
									Tiny
									<input type="radio" id="tiny">
								</label>
							</div>
						</div> --}}
						<div class="sidebar__item border p-2" style="background-color: #004aad">
							<div class="latest-product__text">
								<h4 class="text-white">Produk Terbaru</h4>
								<div class="latest-product__slider owl-carousel">
									<div class="latest-prdouct__slider__item">
										@foreach ($produkNew as $pn)
											<a href="/produk/{{ $pn->slug }}" class="latest-product__item">
												<div class="latest-product__item__pic">
													<img src="{{ asset('storage/' . $pn->image) }}" alt="{{ $pn->name }}" alt="">
												</div>
												<div class="latest-product__item__text">
													<h6 class="text-white">{{ $pn->name }}</h6>
													@if ($pn->harga_diskon)
														<span class="text-white">Rp. {{ number_format($pn->harga_diskon) }}</span>
														<small class="text-white-50" style="text-decoration-line: line-through">Rp.
															{{ number_format($pn->harga) }}</small>
														<small class="badge rounded-pill bg-danger">{{ $pn->diskon }} %</small>
													@else
														<span class="text-white">Rp. {{ number_format($pn->harga) }}</span>
													@endif
													{{-- <span class="text-white">$30.00</span> --}}
												</div>
											</a>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9 col-md-7">
					<div class="product__discount">
						<div class="section-title product__discount__title">
							<h2>Produk Diskon</h2>
						</div>
						<div class="row">
							<div class="product__discount__slider owl-carousel">
								@foreach ($produk as $pd)
									@if ($pd->diskon)
										<div class="col-lg-4">
											<div class="product__discount__item">
												<div class="product__discount__item__pic set-bg" data-setbg="{{ asset('storage/' . $pd->image) }}">
													<div class="product__discount__percent">{{ $pd->diskon }} %</div>
													<ul class="product__item__pic__hover">
														<li><a href="/produk/{{ $pn->slug }}"><i class="fa fa-shopping-cart"></i></a></li>
													</ul>
												</div>
												<div class="product__discount__item__text">
													<span>{{ $pd->kat->name }}</span>
													<h5><a href="/produk/{{ $pn->slug }}">{{ $pd->name }}</a></h5>
													<div class="product__item__price">Rp. {{ number_format($pd->harga_diskon) }}
														<span>Rp. {{ number_format($pd->harga) }}</span>
													</div>
												</div>
											</div>
										</div>
									@else
										<H5>Tidak ada Produk Diskon</H5>
									@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="filter__item">
						<div class="row">
							<div class="col-lg-4 col-md-5">
								<div class="filter__sort">
									<span>Sort By</span>
									<select>
										<option value="0">Default</option>
										<option value="0">Default</option>
									</select>
								</div>
							</div>
							<div class="col-lg-4 col-md-4">
								<div class="filter__found">
									<h6><span>{{ $produk->count() }}</span> Total Produk</h6>
								</div>
							</div>
							<div class="col-lg-4 col-md-3">
								<div class="filter__option">
									<span class="icon_grid-2x2"></span>
									<span class="icon_ul"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach ($produk as $item)
							<div class="col-lg-4 col-md-6 col-sm-6">
								<div class="product__item">
									<div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $item->image) }}">
										<ul class="product__item__pic__hover">
											<li><a href="/produk/{{ $item->slug }}"><i class="fa fa-shopping-cart"></i></a></li>
										</ul>
									</div>
									<div class="product__item__text">
										<h6><a href="/produk/{{ $item->slug }}">{{ $item->name }}</a></h6>
										@if ($item->diskon)
											<h5 class="me-3">Rp. {{ number_format($item->harga_diskon) }}</h5>
											<small class="text-black-50" style="text-decoration-line: line-through">Rp.
												{{ number_format($item->harga) }}</small>
											<span class="badge rounded-pill text-white bg-danger">{{ $item->diskon }} %</span>
										@else
											<h5>Rp. {{ number_format($item->harga) }}</h5>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<div class="product__pagination">
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#"><i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Product Section End -->
@endsection

@push('scripts')
	<script>
		function orderByLowestPrice() {
			window.location.href = "{{ route('orderLowestPrice', ['order' => 'price_asc']) }}";
		}
	</script>
@endpush
