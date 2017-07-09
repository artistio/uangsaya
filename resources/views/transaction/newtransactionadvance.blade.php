{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transaksi baru: Advance</h1>
	Make sure you know what you are doing!
@stop

@section('content')
	<div class="row">
		<!-- Show any errors on top -->
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
        <div class="col-sm-12">
            <form method="POST" action="/transaction">
				{{ csrf_field() }}
				<!-- Section for date picker -->
				<div class="form-group">
					<label for="transaction_date">Tanggal Transaksi (Tanggal/Bulan/Tahun)</label>
					<input type="text" class="form-control pull-right" data-provide="datepicker" data-date-format="dd/mm/yyyy" name="transaction_date" value="{{ date('d/m/Y') }}">
				</div>
				<!-- Section for Debit -->
				<div class="col-sm-6">
					<h2>Transaksi Debit</h2>
					<table class="table">
						<tr>
						<th>Rekening</th>
						<th>Nominal Transaksi</th>
						</tr>
						@for ($i=0;$i<5;$i++)
							<tr>
								<td>
									<select name="debit_account[]" class="form-control">
										<option value='' selected>Pilih Rekening Debit</option>
										@foreach($accounts as $account)
											<option value='{{ $account['account_code'] }}' >{{ $account['name'] }}</option>
										@endforeach
									</select>
								</td>
								<td><input name="debit_amount[]" class="form-control" placeholder="Nominal"></td>
								<td>
									<select name="debit_contact[]" class="form-control">
										<option value='' selected>Pilih Kontak Debit</option>
										@foreach($contacts as $contact)
											<option value='{{ $contact['id'] }}' >{{ $contact['name'] }}</option>
										@endforeach
									</select>
								</td>
							</tr>
						@endfor
					</table>
				</div>
				
				<!-- Section for Credit -->
				<div class="col-sm-6">
					<h2>Transaksi Credit</h2>
					<table class="table">
						<tr>
						<th>Rekening</th>
						<th>Nominal Transaksi</th>
						</tr>
						@for ($i=0;$i<5;$i++)
							<tr>
								<td>
									<select name="credit_account[]" class="form-control">
										<option value='' selected>Pilih Rekening Kredit</option>
										@foreach($accounts as $account)
											<option value='{{ $account['account_code'] }}' >{{ $account['name'] }}</option>
										@endforeach
									</select>
								</td>
								<td><input name="credit_amount[]" class="form-control" placeholder="Nominal"></td>
								<td>
									<select name="credit_contact[]" class="form-control">
										<option value='' selected>Pilih Kontak Debit</option>
										@foreach($contacts as $contact)
											<option value='{{ $contact['id'] }}' >{{ $contact['name'] }}</option>
										@endforeach
									</select>
							</tr>
						@endfor
					</table>
				</div>
				<div class="form-group">
                    <label for="description">Deskripsi Transaksi</label>
					<textarea name="description" class="form-control" placeholder="Deskripsi Transaksi"></textarea>
                </div>
				<button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
	<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
@stop
