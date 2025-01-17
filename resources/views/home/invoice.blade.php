@extends('home.layouts.app')

@section('content')
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light mt-3">
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="/pesanan_saya">Pesanan Saya</a></li>
						<li class="breadcrumb-item active" aria-current="page">Invoice</li>
					</ol>
				</nav>
			</div>
		</nav>
	</div>
	<div class="container">
		<div class="row my-4">
			<div class="col-md-12">
				<div class="my-3">
					<h5 class="mb-3"><a href="/pesanan_saya" class="btn btn-info"><i
								class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h5>
				</div>
				<div class="card">
					<div class="card-body">
						<div class="container mb-5 mt-3">
							<div class="row">
								<div class="col-12">
									@if ($snapToken)
										<button id="pay-button" class="btn btn-xs btn-success"><i class="fa fa-money"></i> Bayar Sekarang</button>
									@else
										<button class="btn btn-xs btn-success" disabled>Paid</button>
									@endif
								</div>
							</div>
							<div class="row d-flex align-items-baseline">
								<div class="col-xl-9">
									<p>Invoice >> <strong>{{ $pesanan->order_number }}</strong></p>
								</div>
								{{-- <div class="col-xl-3 float-end">
									<a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
											class="fa fa-print text-primary"></i> Print</a>
									<a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
											class="far fa-file-pdf text-danger"></i> Export</a>
								</div> --}}
								<hr>
							</div>

							<div class="container">
								<div class="col-md-12">
									<div class="text-center">
										<p class="pt-0 display-5"><strong>Ruby Motor Solo</strong></p>
									</div>

								</div>

								<div class="row">
									<div class="col-xl-6">
										<ul class="list-unstyled">
											<li class="text-muted">Kepada: <strong>{{ $pesanan->name }}</strong></li>
											<li class="text-muted">{{ $pesanan->address }}, City</li>
											<li class="text-muted"><i class="fa fa-phone"></i> {{ $pesanan->contact }}</li>
										</ul>
									</div>
									<div class="col-xl-2"></div>
									<div class="col-xl-4">
										<p class="text-muted">Invoice</p>
										<ul class="list-unstyled">
											<li class="text-muted"><i class="fa fa-circle text-dark"></i> <span class="fw-bold">ID:
												</span>{{ $pesanan->order_number }}</li>
											<li class="text-muted"><i class="fa fa-circle text-dark"></i> <span class="fw-bold">Creation Date: </span>
												{{ $pesanan->created_at->format('d M Y, H:i:s') }}</li>
											<li class="text-muted"><i class="fa fa-circle text-dark"></i> <span class="me-1 fw-bold">Status:</span>
												@if ($pesanan->status == 'unpaid')
													<span class="badge bg-danger">{{ $pesanan->status }}</span>
												@elseif ($pesanan->status == 'paid')
													<span class="badge bg-success">{{ $pesanan->status }}</span>
												@elseif ($pesanan->status == 'dikirim')
													<span class="badge bg-info">{{ $pesanan->status }}</span>
												@elseif ($pesanan->status == 'selesai')
													<span class="badge bg-primary">{{ $pesanan->status }}</span>
												@endif
											</li>
										</ul>
									</div>
								</div>

								<div class="row my-2 mx-1 justify-content-center">
									<table class="table table-striped table-borderless">
										<thead class="text-white bg-dark">
											<tr>
												<th scope="col">#</th>
												<th scope="col">Nama</th>
												<th scope="col">Size</th>
												<th scope="col">Qty</th>
												<th scope="col">Unit Price</th>
												<th scope="col">Amount</th>
											</tr>
										</thead>
										<tbody>
											@php
												$no = 1;
												$subTotal = 0;
											@endphp
											@foreach ($pesanan->pesananDetails as $d)
												<tr>
													<th scope="row">{{ $no++ }}</th>
													<td>{{ $d->product_name }}</td>
													<td>{{ $d->size }}</td>
													<td>{{ $d->quantity }}</td>
													<td>Rp. {{ number_format($d->price) }}</td>
													<td>
														@php
															$amount = $d->quantity * $d->price;
															$subTotal += $d->price;
														@endphp
														Rp. {{ number_format($amount) }}
													</td>
												</tr>
											@endforeach
										</tbody>

									</table>
								</div>
								<div class="row">
									<div class="col-xl-8">
										<p class="ms-3">Catatan : {{ $pesanan->catatan }}</p>

									</div>
									<div class="col-xl-3">
										<ul class="list-unstyled">
											<li class="text-muted ms-3 d-flex align-items-center">
												<span class="text-black me-4">SubTotal</span>
												<span class="ms-auto">Rp. {{ number_format($subTotal) }}</span>
											</li>
											<li class="text-muted ms-3 mt-2 d-flex align-items-center">
												<span class="text-black me-4">Ongkir</span>
												<span class="ms-auto">Rp. {{ number_format($pesanan->ongkir) }}</span>
											</li>
											<li class="text-muted ms-3 mt-2 d-flex align-items-center">
												<span class="text-black me-4">Total</span>
												<span class="ms-auto fw-bold">Rp. {{ number_format($pesanan->total_shopping) }}</span>
											</li>
										</ul>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-xl-10">
										<p>Termiakasih atas pembelian anda.</p>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	@if ($snapToken)
		<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
		</script>
		<script type="text/javascript">
			var payButton = document.getElementById('pay-button');
			payButton.addEventListener('click', function() {
				window.snap.pay('{{ $snapToken }}', {
					onSuccess: function(result) {
						console.log(result);
						alert("Payment successful!");

						// Send an AJAX request to your Laravel backend to update the order status
						$.ajax({
							url: '/update-payment-status',
							method: 'POST',
							data: {
								_token: '{{ csrf_token() }}',
								order_id: result.order_id,
								status: 'paid'
							},
							success: function(response) {
								console.log(response);
								alert("Order status updated successfully");
								// Redirect to /pesanan_saya with a success message
								window.location.href = '/pesanan_saya';
							},
							error: function(response) {
								console.log(response);
								alert("Failed to update order status");
							}
						});
					},
					onPending: function(result) {
						console.log(result);
						alert("Waiting for your payment!");
					},
					onError: function(result) {
						console.log(result);
						alert("Payment failed!");
					},
					onClose: function() {
						console.log('Customer closed the popup without finishing the payment');
						alert('You closed the popup without finishing the payment');
					}
				});
			});
		</script>
	@endif
	<script>
		$(document).ready(function() {
			$('#table').DataTable({
				// "dom": 'rtip',
				responsive: true,
			});
		});
	</script>
@endpush
