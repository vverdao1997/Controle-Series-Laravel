<?php

namespace App\Http\Controllers;

use App\{Serie, Episodio};
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemporadasController extends Controller
{
    public function index($serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;

        return view('temporadas.index', compact(
            'temporadas',
            'serie'
        ));
    }
}
