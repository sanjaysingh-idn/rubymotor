<div class="container mt-2">
	<!-- Hero Section Begin -->
	<section class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="hero__categories">
						<div class="hero__categories__all">
							<i class="fa fa-bars"></i>
							<span>Daftar Kategori</span>
						</div>
						<ul>
							@foreach ($kategori as $k)
								{{-- <li><a href="{{ route('kategori', $k->id) }}">{{ $k->name }}</a></li> --}}
								<li><a href="#">{{ $k->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="hero__search">
						<div class="hero__search__form w-100">
							<form action="#">
								<div class="hero__search__categories">
									All Categories
									<span class="arrow_carrot-down"></span>
								</div>
								<input type="text" placeholder="What do yo u need?" />
								<button type="submit" class="site-btn">
									SEARCH
								</button>
							</form>
						</div>
					</div>
					<div class="hero__item set-bg" data-setbg="{{ asset('template_front/img/banner/banner.png') }}">
						<div class="hero__text">
							<span>GROSIR SPAREPART</span>
							<h2>Sparepart Motor <br />100% Original</h2>
							{{-- <p>Free Delivery Soloraya</p> --}}
							<a href="#" class="primary-btn">BELI SEKARANG</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Section End -->
</div>
