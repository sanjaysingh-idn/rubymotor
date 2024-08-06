<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
	<div class="humberger__menu__logo">
		<a href="#"><img src="{{ asset('template_back') }}/assets/img/favicon/logogepeng.png" alt="" /></a>
	</div>
	<div class="humberger__menu__cart">
		<ul>
			<li>
				<a href="#"><i class="fa fa-shopping-bag"></i>
					<span>{{ Cart::getTotalQuantity() ?? '0y' }}</span></a>
			</li>
		</ul>
		<div class="header__cart__price">
			item: Rp. <span>Rp. {{ number_format(Cart::getTotal() ?? 0) }}
		</div>
	</div>
	<div class="humberger__menu__widget">
		<div class="header__top__right__auth">
			@if (Auth::check())
				<!-- Avatar -->
				<div class="dropdown">
					<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
						role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@if (Auth()->user()->image !== null)
							<img src="{{ asset('storage/' . Auth()->user()->image) }}/default-image.png" class="rounded-circle"
								height="25" alt="User Avatar" loading="lazy" />
						@else
							<img src="{{ asset('template_back/assets/img') }}/default-image.png" class="rounded-circle" height="25"
								alt="Default Avatar" loading="lazy" />
							<p class="mt-3 mx-5">{{ Auth()->user()->name }}</p>
						@endif
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuAvatar">
						<a class="dropdown-item" href="#">My profile</a>
						<a class="dropdown-item" href="/pesanan_saya">Pesanan Saya</a>
						@if (Auth()->user()->role == 'admin')
							<a class="dropdown-item" href="/admin"><span class="btn btn-primary text-white"><i class='bx bxs-dashboard'></i>
									Halaman Admin</span></a>
						@endif
						<form method="post" action="{{ route('logout') }}">
							@csrf
							<button type="submit" class="dropdown-item"><span class="btn btn-danger"><i class='bx bxs-log-out'></i>
									Logout</span></button>
						</form>
					</div>
				</div>
			@else
				<div class="d-flex align-items-center">
					<a href="/login" class="primary-btn text-white {{ request()->is('login', 'register') ? 'active' : '' }} me-3">
						<i class="bx bx-log-in-circle"></i>
						Login / Daftar
					</a>
				</div>
			@endif
		</div>
	</div>
	<nav class="humberger__menu__nav mobile-menu">
		<ul>
			<li class="active"><a href="/">Home</a></li>
			<li><a href="/produk">Produk</a></li>
			<li><a href="/tentang">Tentang Kami</a></li>
		</ul>
	</nav>
	<div id="mobile-menu-wrap"></div>
	<div class="humberger__menu__contact">
		<ul>
			<li><i class="fa fa-instagram"></i> rubymotorsolo</li>
			<li>Jl. Malabar Timur No.20, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57127</li>
		</ul>
	</div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
	<div class="header__top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="header__top__left">
						<ul class="mt-2 @if (Auth::check()) mt-3 @endif">
							<li>
								<a href="https://www.instagram.com/rubymotorsolo/" target="_blank"
									style="text-decoration: none; color: black;"><i class="fa fa-instagram"></i> RubyMotorSolo</a>
							</li>
							<li>GROSIR, ECER Sparepart & SERVICE Motor Soloraya</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="header__top__right">
						<div class="header__top__right__auth">
							@if (Auth::check())
								<!-- Avatar -->
								<div class="dropdown">
									<a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar"
										role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										@if (Auth()->user()->image !== null)
											<img src="{{ asset('storage/' . Auth()->user()->image) }}/default-image.png" class="rounded-circle"
												height="25" alt="User Avatar" loading="lazy" />
										@else
											<img src="{{ asset('template_back/assets/img') }}/default-image.png" class="rounded-circle" height="25"
												alt="Default Avatar" loading="lazy" />
											<p class="mt-3 mx-5">{{ Auth()->user()->name }}</p>
										@endif
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuAvatar">
										<a class="dropdown-item" href="#">My profile</a>
										<a class="dropdown-item" href="/pesanan_saya">Pesanan Saya</a>
										@if (Auth()->user()->role == 'admin')
											<a class="dropdown-item" href="/admin"><span class="btn btn-primary text-white"><i
														class='bx bxs-dashboard'></i> Halaman Admin</span></a>
										@endif
										<form method="post" action="{{ route('logout') }}">
											@csrf
											<button type="submit" class="dropdown-item"><span class="btn btn-danger"><i class='bx bxs-log-out'></i>
													Logout</span></button>
										</form>
									</div>
								</div>
							@else
								<div class="d-flex align-items-center">
									<a href="/login"
										class="primary-btn text-white {{ request()->is('login', 'register') ? 'active' : '' }} me-3">
										<i class="bx bx-log-in-circle"></i>
										Login / Daftar
									</a>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="header__logo">
					<a href="/index.html"><img src="{{ asset('template_back') }}/assets/img/favicon/logogepeng.png" height="80"
							alt="" /></a>
				</div>
			</div>
			<div class="col-lg-6">
				<nav class="header__menu text-center">
					<ul>
						<li class="{{ Request::is('/') ? 'active' : '' }}">
							<a href="/">Home</a>
						</li>
						<li class="{{ Request::is('produk') ? 'active' : '' }}">
							<a href="/produk">Produk</a>
						</li>
						<li><a href="/tentang">Tentang Kami</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-lg-3">
				<div class="header__cart">
					<ul>
						<li>
							<a href="/keranjang"><i class="fa fa-shopping-bag"></i>
								<span>{{ Cart::getTotalQuantity() ?? '0' }}</span></a>
							</a>
						</li>
					</ul>
					<div class="header__cart__price">
						item: Rp. <span>Rp. {{ number_format(Cart::getTotal() ?? 0) }}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="humberger__open">
			<i class="fa fa-bars"></i>
		</div>
	</div>
</header>
<!-- Header Section End -->
