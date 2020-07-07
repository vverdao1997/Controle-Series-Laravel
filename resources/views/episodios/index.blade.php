@extends('layout')

@section('cabecalho')
Episodios da {{$temporada->numero}}ª Temporada de {{$temporada->serie->nome}}
@endsection

@section('conteudo')

    @includeWhen(!empty($mensagem), 'mensagem', ['mensagem' => $mensagem])

    <a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>

    <form action="/temporada/{{$temporada->id}}/episodios/assistir" method="POST">
        @csrf

        <ul class="list-group">
            @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center"> <!-- display flex por padrão um do lado do outro -->
                <a href="/temporada/{{$episodio->id}}">Episodio {{ $episodio->numero }}</a>
            <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistiu == true ? "checked" : ""}}/>
            </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2 mb-2 float-right">Salvar</button>
    </form>

@endsection
