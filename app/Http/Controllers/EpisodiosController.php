<?php

namespace App\Http\Controllers;

use App\{Temporada, Episodio};
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(int $temporadaId, Request $request)
    {
        $temporada = Temporada::find($temporadaId);
        $episodios = $temporada->episodios;

        return view('episodios.index', [
            'temporada' => $temporada,
            'episodios' =>  $episodios,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function assistir(Temporada $temporadaId, Request $request){
        $episodiosAssistidos = $request->episodios;
        $temporadaId->episodios->each(function(Episodio $episodio) use ($episodiosAssistidos){
            $episodio->assistiu = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporadaId->push();

        $request->session()->flash('mensagem', "Episodios marcados como assistido");

        return redirect()->back();
    }
}
