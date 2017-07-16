{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Buat Account Baru</h1>
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
        <div class="col-sm-10">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Nama Rekening</th>
					<th>Kode</th>
					<th>Bank & Nomor Rekening</th>
					<th>Mata Uang</th>
					<th>Saldo</th>
					<th>Deskrpisi</th>
				</tr>
				@foreach($accountList as $account)
					<tr>
						<td>{{ $account->name }}</td>
						<td>{{ $account->account_code }}</td>
						<td>{{ $account->bank_name }} {{ $account->account_number }}</td>
						<td>{{ $account->currency_code }}</td>
						@if (($account->type_id == 1) || ($account->type_id == 4))
							<td>{{ $account->journalRecords->sum('debit_amount') - $account->journalRecords->sum('credit_amount') }}</td>
						@else
							<td>{{ $account->journalRecords->sum('credit_amount') - $account->journalRecords->sum('debit_amount') }}</td>
						@endif
						<td>{{ $account->description }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
