@extends('home.layouts.app')

@section('content')
	<div class="container mb-5">
		<div class="login-container" data-aos="fade-in">
			<section>
				<div class="container h-100">
					<div class="row d-flex justify-content-center align-items-center h-100">
						<div class="col-lg-12 col-xl-11">
							<div class="text-center text-brown">
								<h3><strong><span class="text-dark">Selamat Datang di</span> Ruby Motor Solo</strong></h3>
								<hr>
								<h6>Halaman <strong>Register</strong> Pelanggan</h6>
								<div class="text-center">
									<small>Silahkan isi formulir dibawah ini</small>
								</div>
							</div>
							<div class="card shadow-lg mt-3" style="border-radius: 25px;">
								<div class="card-body p-5">
									<div class="row justify-content-center">
										<div class="col-md-6 d-flex align-items-center">
											<img src="{{ asset('template_back/assets/img/illustrations') }}/ilulogin.png" class="img-fluid"
												alt="Sample image">
										</div>
										<div class="col-md-6">
											<form method="POST" action="{{ route('register') }}">
												@csrf
												<div class="mb-4">
													<label class="form-label" for="name">Nama</label>
													<div class="input-group">
														<span class="input-group-text"><i class="fa fa-user"></i></span>
														<input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
															name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
													</div>
													@error('name')
														<div class="text-danger mt-1">
															<small><strong>{{ $message }}</strong></small>
														</div>
													@enderror
												</div>

												<div class="mb-4">
													<label class="form-label" for="contact">No Hp / Whatsapp</label>
													<div class="input-group">
														<span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
														<input id="contact" type="number" class="form-control @error('contact') is-invalid @enderror"
															name="contact" value="{{ old('contact') }}" required autocomplete="contact" autofocus>
													</div>
													@error('contact')
														<div class="text-danger mt-1">
															<small><strong>{{ $message }}</strong></small>
														</div>
													@enderror
												</div>

												<div class="mb-4">
													<label class="form-label" for="email">Email</label>
													<div class="input-group">
														<span class="input-group-text"><i class="fa fa-envelope"></i></span>
														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
															name="email" value="{{ old('email') }}" required autocomplete="email">
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

												<div class="mb-4">
													<label class="form-label" for="password-confirm">Confirm Password</label>
													<div class="input-group">
														<span class="input-group-text"><i class="fa fa-key"></i></span>
														<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
															autocomplete="new-password">
													</div>
												</div>

												<div class="mb-3 text-center">
													<small>Sudah punya akun? <a href="/login">Login</a></small>
												</div>

												<div class="d-flex justify-content-center">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-registered"></i> Register
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
	</div>
@endsection
