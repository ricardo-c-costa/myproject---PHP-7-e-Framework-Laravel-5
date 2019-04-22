@if(Session::has('busca_success'))
	<div class="alert alert-success">
		<hr>
		<strong>Salvo !</strong>
		<ul>
			<li>{{ Session::get('busca_success') }}</li>
		</ul>
	</div>
@endif
@if(Session::has('error'))
	<div class="alert alert-danger">
		<hr>
		<strong>Erro :(</strong>
		<ul>
			<li>{{ Session::get('error') }}</li>
		</ul>
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Erro :(</strong>
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
