<?php

namespace Tests\Unit;

use App\Serie;
use App\Services\SerieService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new SerieService();
        $nomeSerie = "Teste";
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', [
            'serie_id' => $serieCriada->id,
            'numero' => 1
        ]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
