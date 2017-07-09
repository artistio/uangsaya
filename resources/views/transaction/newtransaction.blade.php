{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Transaksi baru: {{ $transaction_type }}</h1>
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
            <form method="POST" action="/{{ $transaction_type }}">
				 {{ csrf_field() }}
				<div class="col-sm-6 form-group float-label-control">
                    <label for="debit_account">Dari</label>
					<select name="debit_account" class="form-control">
						@foreach($source_account as $account)
							<option value='{{ $account['account_code'] }}' >{{ $account['name'] }}</option>
						@endforeach
					</select>
                </div>
				<div class="col-sm-6 form-group float-label-control">
                    <label for="credit_account">Ke</label>
					<select name="credit_account" class="form-control">
						@foreach($destination_account as $account)
							<option value='{{ $account['account_code'] }}' >{{ $account['name'] }}</option>
						@endforeach
					</select>
                </div>
				<div class="col-sm-12 form-group float-label-control">
                    <label for="amount">Nominal Transaksi</label>
					<input name="amount" class="form-control" placeholder="Nominal">
                </div>
				<div class="col-sm-12 form-group float-label-control">
                    <label for="tag">Tag (Comma-Separated)</label>
					<input name="tag" class="form-control" placeholder="mis: Bali 2017, B1234CDE">
                </div>
				<div class="col-sm-12 form-group float-label-control">
                    <label for="">Deskripsi Transaksi</label>
					<textarea name="description" class="form-control" placeholder="Deskripsi Transaksi"></textarea>
                </div>
				<button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
		</div>
		

	</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
