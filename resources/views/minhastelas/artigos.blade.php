<!doctype html>
<html lang="pt-br">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Artigos</title>
</head>
<body>
	@if(isset(Auth::user()->user))
			<nav class="nav mx-auto alert alert-dark">
				<strong class="navbar-brand">Bem Vindo, {{ Auth::user()->user }}</strong>
				<a href="{{ url('capturar') }}" class="nav-link">Capturar</a>
				<a href="" class="nav-link disabled">Artigos</a>
				<a href="{{ url('logout') }}" class="nav-link">Logout</a>
			</nav>
	@else
		<script type="text/javascript">window.location = 'logout';</script>
	@endif
	<br>
	<div class="col-8 mx-auto table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Title</th>
					<th scope="col">Link</th>
					<th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				@foreach($artigos as $artigo)
				<tr>
					<td>{{ $artigo->id }}</td>
					<td>{{ $artigo->titulo }}</td>
					<td>{{ $artigo->link }}</td>
					<td>
						 <a href="{{ route('excluir.artigo',$artigo->id) }}" class="btn btn-danger">Excluir</a>
					</td>
				</tr>	
					@endforeach
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

