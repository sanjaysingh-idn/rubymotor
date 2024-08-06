@extends('home.layouts.app')

@section('content')
	<div class="container mb-5">
		{{-- <nav aria-label="breadcrumb" class="mt-3">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Login</li>
			</ol>
		</nav> --}}
		<section>
			<div class="container h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
					<div class="col-lg-12 col-xl-11">
						<div class="text-center text-brown">
							<h3><strong><span class="text-dark">Selamat Datang di</span> Ruby Motor Solo</strong></h3>
							<hr>
							<h6>Halaman <strong>Login</strong> Pelanggan</h6>
						</div>
						<div class="card shadow-lg mt-3" style="border-radius: 25px;">
							<div class="card-body p-5">
								<div class="row justify-content-center">
									<div class="col-md-6 d-flex align-items-center">
										<img src="{{ asset('template_back/assets/img/illustrations') }}/ilulogin.png" class="img-fluid"
											alt="Sample image">
									</div>
									<div class="col-md-6">
										<form method="POST" action="{{ route('login') }}">
											@csrf
											<div class="mb-4">
												<label class="form-label" for="email">Email</label>
												<div class="input-group">
													<span class="input-group-text"><i class="fa fa-envelope"></i></span>
													<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
														name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												</div>
												@error('email')
													<div class="text-danger mt-1">
														<small><strong>{{ $message }}</strong></small>
													</div>
												@enderror
											</div>

											<div class="mb-4">
												<label class="form-label" for="password">Password</label>
												<div class="input-group">
													<span class="input-group-text"><i class="fa fa-lock"></i></span>
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
														name="password" required autocomplete="new-password">
												</div>
												@error('password')
													<div class="text-danger mt-1">
														<small><strong>{{ $message }}</strong></small>
													</div>
												@enderror
											</div>

											<div class="mb-4 form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember"
													{{ old('remember') ? 'checked' : '' }}>
												<label class="form-check-label" for="remember">Remember Me</label>
											</div>

											<div class="mb-4 text-center">
												<small>Belum punya akun? <a href="{{ route('register') }}">Register</a></small>
											</div>

											<div class="d-flex justify-content-center">
												<button type="submit" class="btn btn-primary">
													<i class="fa fa-arrow-right"></i> Login
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	</div>
@endsection
