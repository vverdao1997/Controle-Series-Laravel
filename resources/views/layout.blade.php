<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Controle de Series</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
          crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        <a class="navbar navbar-expand-lg" href="{{ route('listar_series') }}">Home</a>
        <!-- Só executa se estiver logado -->
        @auth
            <a class="text-danger" href="/sair">Sair</a>
        @endauth

         <!-- Só executa se não estiver logado -->
         @guest
         <a class="" href="/entrar">Entrar</a>
         @endguest
   </nav>
	<div class="container">
		<div class="jumbotron">
			<h1>@yield('cabecalho')</h1>
		</div>

		@yield('conteudo')
	</div>
</body>
</html>
