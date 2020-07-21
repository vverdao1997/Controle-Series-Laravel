<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\SerieService;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller{

	public function index(Request $request) {

        /*if(!Auth::check()){
            echo "Não Autenticado";
            exit();
        }*/

		// echo $request->url(); //Captura toda a url
		// echo "<br>";
		// var_dump($request->query()); //retorna todos os parametros passados na url
		// echo "<br>";
		// echo $request->query('parametro'); //busca o parametro passado na url

		$series = Serie::query()->orderBy('nome')->get();

		//return view("series.index", [
		//	'series' => $series //variavel séries que recebe o array series
		//]); //pasta . arquivo, lista de parametros que serão passados

		$mensagem = $request->session()->get("mensagem");
		return view("series.index", compact('series', 'mensagem'));
	}


	public function create() {
		return view("series.create"); //pasta . arquivo
	}


    public function store(SeriesFormRequest $request, SerieService $serieService) {

        $serie = $serieService->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()->flash("mensagem", "Serie {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route("listar_series");
    }


    public function edit(int $id, Request $request) {

        $nome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $nome;
        $serie->save();

    }


    public function destroy(Request $request, SerieService $serieService) {

        $nomeSerie = $serieService->removerSerie($request->id);
        $request->session()->flash("mensagem", "Serie  $nomeSerie removida com sucesso");

        return redirect()->route("listar_series");
    }

}
