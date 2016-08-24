@extends('layout.default')

@section('styles')
	<link rel="stylesheet" href="/assets/css/styles.css">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 splash">
				<img src="/assets/img/PeaLogo.png" alt="" />
				<span>Pico Framework for PHP with Multilanguage, Routing e Blade Templates</span>
			</div>
		</div>
		<div class="row">
			@if($data != '')
				<div class="col-xs-12 splash">
					You are entering with path: {{ $data }}
				</div>
			@endif
		</div>
	</div>
@stop

@section('scripts')
	<script src="/assets/js/scripts.js"></script>
@endsection
