{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hasil Transaksi</h1>
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
        <div class="col-sm-6">
            Transaksi Jurnal {{ $journalId }} Sukses dengan data sbb:
			<table class='table'>
				<tr>
					<th>Rekening</th>
					<th>Jumlah Debit</th>
					<th>Jumlah Kredit</th>
				</tr>
				@foreach($journalEntries as $journalRecord)
				<tr>
					<td>{{ $journalRecord->account_code }} - {{ $journalRecord->financialAccount()->firstorfail()->name }}</td>
					<td>{{ $journalRecord->debit_amount }}</td>
					<td>{{ $journalRecord->credit_amount }}</td>
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
