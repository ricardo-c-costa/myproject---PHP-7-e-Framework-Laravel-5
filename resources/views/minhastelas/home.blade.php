<!doctype html>
<html lang="pt-br">
<head>
	<title>Home</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body class="jumbotron jumbotron-fluid mt-3 p-0">
	<div class="container">
		<h1 class="display-4">Bem Vindo !</h1>
		<p class="lead">Projeto desenvolvido em PHP 7 e Framework Laravel 5.</p>
		<hr>
		@if(isset(Auth::user()->user))
			<script type="text/javascript">window.location = 'capturar.logado';</script>
		@endif
		<form action="{{ route('home.login') }}" method="POST" class="col-4 mx-auto">
			{{ csrf_field() }}
			<div class="form-group p-2">
				<input type="text" name="user" class="form-control" placeholder="User">
			</div>
			<div class="form-group p-2">
				<input type="password" name="password" class="form-control" placeholder="Senha">
			</div>
			<div class="form-group p-2">
				<input type="submit" class="btn btn-secondary btn-lg btn-block" value="Entrar">
			</div>
		</form>
		@include('messages')
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

