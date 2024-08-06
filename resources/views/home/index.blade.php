@extends('home.layouts.app')

@section('content')
	<div class="container">
		<div class="">
			<!-- Categories Section Begin -->
			<section class="categories">
				<div class="container">
					<div class="row">
						<div class="categories__slider owl-carousel">
							@foreach ($kategori as $k)
								<div class="col-lg-3">
									@if ($k->image == 'lorem')
										<div class="categories__item set-bg" data-setbg="{{ asset('template_front/img/noimage.jpg') }}">
											<h5><a href="#">{{ $k->name }}</a></h5>
										</div>
									@else
										<div class="categories__item set-bg" data-setbg="{{ asset('storage/' . $k->image) }}">
											<h5><a href="#">{{ $k->name }}</a></h5>
										</div>
									@endif
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</section>
			<!-- Categories Section End -->

			<!-- Featured Section Begin -->
			<section class="featured spad">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h2>Produk Unggulan</h2>
							</div>
							<div class="featured__controls">
								<ul>
									<li class="active" data-filter="*">All</li>
									@foreach ($kategori as $ka)
										<li data-filter=".{{ $ka->slug }}">{{ $ka->name }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="row featured__filter">
						@foreach ($produk as $p)
							<div class="col-lg-3 col-md-4 col-sm-6 mix {{ $p->kat->slug }}">
								@if ($p->image == 'lorem')
									<div class="featured__item">
										<div class="featured__item__pic set-bg" data-setbg="{{ asset('template_front/img/noimage.jpg') }}">
											<ul class="featured__item__pic__hover">
												<li>
													<a href="/produk/{{ $p->slug }}"><i class="fa fa-shopping-cart"></i></a>
												</li>
											</ul>
										</div>
										<div class="featured__item__text">
											<h6><a href="#">{{ $p->name }}</a></h6>
											@if ($p->harga_diskon)
												<h5>Rp. {{ number_format($p->harga_diskon) }}</h5>
												<small class="text-black-50" style="text-decoration-line: line-through">Rp.
													{{ number_format($p->harga) }}</small>
												<small class="badge rounded-pill text-white bg-danger">{{ $p->diskon }} %</small>
											@else
												<h5>Rp. {{ number_format($p->harga) }}</h5>
											@endif
											{{-- <h5>Rp. {{ number_format($p->harga) }}</h5> --}}
										</div>
									</div>
								@else
									<div class="featured__item">
										<div class="featured__item__pic set-bg" data-setbg="{{ asset('storage/' . $p->image) }}">
											<ul class="featured__item__pic__hover">
												<li>
													<a href="/produk/{{ $p->slug }}"><i class="fa fa-shopping-cart"></i></a>
												</li>
											</ul>
										</div>
										<div class="featured__item__text">
											<h6><a href="#">{{ $p->name }}</a></h6>
											@if ($p->harga_diskon)
												<h5>Rp. {{ number_format($p->harga_diskon) }}</h5>
												<small class="text-black-50" style="text-decoration-line: line-through">Rp.
													{{ number_format($p->harga) }}</small>
												<small class="badge rounded-pill text-white bg-danger">{{ $p->diskon }} %</small>
											@else
												<h5>Rp. {{ number_format($p->harga) }}</h5>
											@endif
										</div>
									</div>
								@endif
							</div>
						@endforeach
					</div>
				</div>
			</section>
			<!-- Featured Section End -->

			{{-- <section class="banner-end">
				<!-- Banner Begin -->
				<div class="banner my-5">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="banner__pic">
									<img src="{{ asset('template_front') }}/img/banner/banner-1.jpg" alt="" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="banner__pic">
									<img src="{{ asset('template_front') }}/img/banner/banner-2.jpg" alt="" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Banner End -->
			</section> --}}
		</div>
	</div>
@endsection
