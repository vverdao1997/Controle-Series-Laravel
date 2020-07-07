@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST">
    @csrf
    <!-- diretiva do Blade para gerar um "token" de CSRF para cada sessão de usuário,
        garante realmente que o Laravel que gerou e entregou este token  -->

    <div class="row"><!-- Os elementos seram distribuidos em uma linha -->
        <div class="col col-8"><!-- Vai ocupar oito colunas -->
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>

        <div class="col col-2"><!-- Vai ocupar duas colunas -->
            <label for="qtd_temporadas">Nº Temporadas: </label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporada">
        </div>

        <div class="col col-2"><!-- Vai ocupar duas colunas -->
            <label for="ep_por_temporada">Ep. por Episodios: </label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>

	<button class="btn btn-primary mt-2" type="submit">Adicionar</button>
</form>
@endsection

