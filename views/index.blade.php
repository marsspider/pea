@extends('layout.default')

@section('styles')
	<link rel="stylesheet" href="/assets/css/styles.css">
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 splash">
				<img src="/assets/img/PeaLogo.png" alt="" />
				<span>{{ tr('intro_headline') }}</span>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 splash-info-lang">
				{{ tr('intro_lang_info') }}<span class="highlight">{{ App::$currentLang }}</span>
			</div>
		</div>
		<div class="row">
			@if($data != '')
				<div class="col-xs-12 splash-info-path">
					{{ tr('intro_path_info') }}<span class="highlight">{{ $data }}</span>
				</div>
			@endif
		</div>
	</div>
@stop

@section('scripts')
	<script src="/assets/js/scripts.js"></script>
@endsection
