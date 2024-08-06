@extends('admin.layouts.app')

@section('content')
	<!-- Product Section -->
	<section class="products py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-header bg-primary text-white">
							Total Produk
						</div>
						<div class="card-body">
							<h2 class="card-title my-5">
								<strong>{{ $t_produk }}</strong> Produk
							</h2>
							<a href="/admin/produk" class="btn btn-primary">
								<i class="bx bx-box"></i>
								Daftar Produk
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-header bg-danger text-white">
							Total Kategori
						</div>
						<div class="card-body">
							<h2 class="card-title my-5">
								<strong>{{ $t_kategori }}</strong> Kategori
							</h2>
							<a href="/admin/kategori" class="btn btn-danger">
								<i class="bx bx-list-ul"></i>
								Daftar Kategori
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card mb-4">
						<div class="card-header bg-dark text-white">
							Total Pesanan Masuk
						</div>
						<div class="card-body">
							<h2 class="card-title my-5">
								<strong>{{ $t_pesanan }}</strong> Pesanan
							</h2>
							<a href="/admin/pesanan" class="btn btn-dark">
								<i class="bx bx-shopping-bag"></i>
								Daftar Pesanan
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
