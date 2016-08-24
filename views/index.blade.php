@extends('layout.default')

@section('styles')
	<link rel="stylesheet" href="/assets/css/styles.css">
@endsection

@section('content')
	<div class="container">
		Content HERE<br />
		Data: {{ $data }}
	</div>
@stop

@section('scripts')
	<script src="/assets/js/scripts.js"></script>
@endsection
