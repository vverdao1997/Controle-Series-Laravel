<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\SerieService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{


    public function TestCriarSerie(){
        $criadorDeSerie = new SerieService;
        $nomeSerie = 'Teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        //Verifica se o valor retornado é uma instancia de Serie
        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', [
            'serie_id' => $serieCriada->id,
            'numero' => 1

        ]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);


    }
}
