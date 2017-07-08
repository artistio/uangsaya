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
        <div class="col-sm-6">
            <form method="POST" action="/account">
				 {{ csrf_field() }}
                <div class="form-group float-label-control">
                    <label for="">Name</label>
                    <input name="name" class="form-control" placeholder="Nama Account">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Jenis Rekening</label>
                    <select name="type_id" class="form-control">
						@foreach($basicAccountType as $accountType)
							<option value={{ $accountType->id }} >{{ $accountType->name }}</option>
						@endforeach
					</select>
                </div>
                <div class="form-group float-label-control">
                    <label for="">Kode Rekening</label>
                    <input name="account_code" class="form-control" placeholder="Kode Rekening">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Nama Bank/Manager Investasi (Opsional)</label>
                    <input name="bank_name" class="form-control" placeholder="Nama Bank/Manager Investasi">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Nomor Rekening (Opsional)</label>
                    <input name="account_number" class="form-control" placeholder="Nomor Rekening">
                </div>
				<div class="form-group float-label-control">
                    <label for="">Mata Uang</label>
					<select name="currency" class="form-control">
						@foreach($currencyList as $currencyOption)
							<option value={{ $currencyOption['code'] }} >{{ $currencyOption['name'] }}</option>
						@endforeach
					</select>
                </div>
				<div class="form-group float-label-control">
                    <label for="">Deskripsi</label>
					<textarea name="description" class="form-control" placeholder="Deskripsi Rekening"></textarea>
                </div>
				<button type="submit" class="btn btn-primary">Buat Rekening</button>
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
