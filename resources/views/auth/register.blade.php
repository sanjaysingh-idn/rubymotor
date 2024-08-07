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
									<div class="text-center mb-3 text-brown">
										<h3><strong><span class="text-dark">Selamat Datang di</span> Ruby Motor Solo</strong></h3>
										<hr>
										<h6>Halaman Register Pelanggan</h6>
										<small>Silahkan isi </small>
									</div>
									<form method="POST" action="{{ route('login') }}">
										@csrf
										<div class="form-group">
											<label for="email">Email</label>
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
												value="{{ old('email') }}" required autocomplete="email" autofocus>

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
												name="password" required autocomplete="current-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember"
													{{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember">
													{{ __('Remember Me') }}
												</label>
											</div>
										</div>
										<button type="submit" class="btn btn-primary">Register</button>
									</form>
									<div class="my-3 text-center">
										<small>Sudah punya akun ? Silahkan <a href="/login">Login</a></small>
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
