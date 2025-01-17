@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<h2 class="fw-bold"><span class="text-muted fw-light py-5">{{ $title }}</span></h2>
		<div class="row">
			<div class="col mb-3">
				<a href="/admin/produk" class="btn btn-secondary"><i class="bx bx-left-arrow"></i> Kembali</a>
			</div>
		</div>
		<div class="col-12">
			<div class="card card-action mb-4">
				<div class="card-header align-items-center">
					<h4 class="card-action-title mb-0"><i class='bx bx-edit'></i> Edit Produk <strong>{{ $produk->name }}</strong></h4>
				</div>
				<div class="card-body">
					<div class="d-flex align-items-start align-items-sm-center gap-4">
						<div class="button-wrapper">
							<form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<label for="formFile" class="form-label">Foto Lama</label>
								<img class="img-thumbnail shadow mb-5" src="{{ asset('storage/' . $produk->image) }}" width="200"
									alt="Foto {{ $produk->name }}" class="img-thumbnail">
								<label for="formFile" class="form-label">Upload Foto Produk</label>
								<input class="form-control" id="imageInput" type="file" id="formFile" name="image">
								<div class="mt-3">
									<img id="previewImage" src="#" alt="Preview" class="img-fluid" style="50px;">
								</div>
								<button type="button" id="resetButton" class="btn btn-secondary my-3">Reset</button>
								<p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 1MB</p>
						</div>
					</div>
				</div>
				<hr class="my-0" />
				<div class="card-body">
					<div class="row">
						<div class="mb-3 col-md-6">
							<label for="name" class="form-label">Nama Produk</label>
							<input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
								value="{{ $produk->name }}" />
							@error('name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="mb-3 col-md-6">
							<label for="id_kategori" class="form-label">Kategori</label>
							<select id="id_kategori" class="select2 form-select @error('id_kategori') is-invalid @enderror" name="id_kategori"
								required>
								<option value="" hidden class="text-capitalize">--Pilih Kategori--</option>
								@foreach ($kategori as $k)
									<option value="{{ $k->id }}" class="text-capitalize"
										{{ $k->id == $produk->id_kategori ? 'selected' : '' }}>{{ $k->name }}</option>
								@endforeach
							</select>
							@error('id_kategori')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="mb-3 col-md-12">
							<label for="harga" class="form-label">Harga</label>
							<div class="input-group mt-2">
								<span class="input-group-text">Rp</span>
								<input type="number" class="form-control" name="harga" id="harga" min="1"
									value="{{ $produk->harga }}">
							</div>
						</div>
						<div class="mb-3 col-md-6">
							<label for="harga_diskon" class="form-label">Harga Diskon</label>
							<div class="input-group mt-2">
								<span class="input-group-text">Rp</span>
								<input type="number" class="form-control" name="harga_diskon" id="harga_diskon" min="1">
							</div>
						</div>
						<div class="mb-3 col-md-6">
							<label for="diskon" class="form-label">Diskon</label>
							<div class="input-group mt-2">
								<span class="input-group-text">%</span>
								<input type="number" class="form-control" name="diskon" id="diskon" min="1" readonly>
							</div>
						</div>

						<div class="col-md-6 mb-3">
							<label for="text" class="form-label">Stok</label>
							<div class="input-group mt-2">
								<span class="input-group-text">Pcs</span>
								<input type="number" class="form-control" name="stok" min="1" value="{{ $produk->stok }}">
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="text" class="form-label">Berat</label>
							<div class="input-group mt-2">
								<span class="input-group-text">Gr</span>
								<input type="number" class="form-control" name="berat" min="1" value="{{ $produk->berat }}">
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<label for="text" class="form-label">Deskripsi</label>
							<textarea name="desc" id="desc">{!! $produk->desc !!}</textarea>
						</div>
					</div>
					<div class="mt-2">
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
					</div>
					</form>
				</div>
			</div>
			<!--/ Edit Profile -->
		</div>
	</div>
	<!--/ User Profile Content -->
@endsection
@push('scripts')
	<!-- Include the CKEditor JavaScript file -->
	<script src="{{ asset('template_back/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
	<script>
		tinymce.init({
			selector: '#desc',
			plugins: 'table',
		});

		$(document).ready(function() {
			// When a file is selected
			$("#imageInput").change(function() {
				readURL(this);
			});

			// Reset button click event
			$("#resetButton").click(function() {
				resetPreview();
			});
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					$('#previewImage').attr('src', e.target.result).css('width', '150px');
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		function resetPreview() {
			$('#imageInput').val(''); // Clear the file input value
			$('#previewImage').attr('src', '#'); // Reset the preview image source
		}
	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const hargaInput = document.getElementById('harga');
			const hargaDiskonInput = document.getElementById('harga_diskon');
			const diskonInput = document.getElementById('diskon');

			function calculateDiscount() {
				const harga = parseFloat(hargaInput.value);
				const hargaDiskon = parseFloat(hargaDiskonInput.value);

				if (harga && hargaDiskon) {
					const discount = ((harga - hargaDiskon) / harga) * 100;
					diskonInput.value = discount.toFixed(2); // Set the discount percentage with 2 decimal places
				} else {
					diskonInput.value = ''; // Clear the discount field if inputs are invalid
				}
			}

			hargaDiskonInput.addEventListener('input', calculateDiscount);
		});
	</script>
@endpush
