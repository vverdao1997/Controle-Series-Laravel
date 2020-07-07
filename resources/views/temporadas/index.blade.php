@extends('layout')

@section('cabecalho')
Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')

<a href="{{route('form_criar_serie')}}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center"> <!-- display flex por padrão um do lado do outro -->
    <a href="/temporada/{{$temporada->id}}/episodios">Temporada {{ $temporada->numero }}</a>
        <span class="badge badge-secondary">
            {{ $temporada->getEpisodiosAssistidos()->count()}} / {{ $temporada->episodios->count() }}
        </span>
    </li>
    @endforeach
</ul>
@endsection
