{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Buat Kontak Baru</h1>
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
            <form method="POST" action="/contact">
				 {{ csrf_field() }}
                <div class="form-group float-label-control">
                    <label for="">Name</label>
                    <input name="name" class="form-control" placeholder="Nama Kontak">
                </div>
				<button type="submit" class="btn btn-primary">Buat Kontak</button>
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
