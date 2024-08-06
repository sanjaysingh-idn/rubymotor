@extends('home.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class=" mt-5">
					<h2><strong>Tentang Kami</strong></h2>

				</div>
			</div>
		</div>
		<!-- Contact Section Begin -->
		<section class="contact spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 text-center">
						<div class="contact__widget">
							<span class="icon_phone"></span>
							<h4>Whatsapp</h4>
							<p>082138012342</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 text-center">
						<div class="contact__widget">
							<span class="icon_pin_alt"></span>
							<h4>Alamat</h4>
							<p>Jl. Malabar Timur No.20, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57127</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 text-center">
						<div class="contact__widget">
							<span class="icon_clock_alt"></span>
							<h4>Jam Buka</h4>
							<p>08.00 - 17.00 WIB</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 text-center">
						<div class="contact__widget">
							<span class="icon_mail_alt"></span>
							<h4>Email</h4>
							<p>rubymotorsolo@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact Section End -->

		<!-- Map Begin -->
		<div class="map">
			<iframe
				src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19838.521692805498!2d110.8402977!3d-7.5374221!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16c5835d6cf9%3A0xd8d43a7dada9a876!2sRuby%20Motor!5e1!3m2!1sen!2sid!4v1722866569070!5m2!1sen!2sid"
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
				referrerpolicy="no-referrer-when-downgrade"></iframe>
			<div class="map-inside">
				<i class="icon_pin"></i>
				<div class="inside-widget">
					<h4>Ruby Motor</h4>
					<ul>
						<li>082138012342</li>
						<li>Jl. Malabar Timur No.20, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57127</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Map End -->

		<!-- Contact Form Begin -->
		<div class="contact-form spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="contact__form__title">
							<h2>Leave Message</h2>
						</div>
					</div>
				</div>
				<form action="#">
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<input type="text" placeholder="Your name">
						</div>
						<div class="col-lg-6 col-md-6">
							<input type="text" placeholder="Your Email">
						</div>
						<div class="col-lg-12 text-center">
							<textarea placeholder="Your message"></textarea>
							<button type="submit" class="site-btn">SEND MESSAGE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- Contact Form End -->
	</div>
@endsection
