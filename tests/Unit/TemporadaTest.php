<?php

namespace Tests\Unit;

use App\Episodio;
use App\Temporada;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{
    private $temporada;


    protected function setUP() : void
    {
        //É executado antes de cada Teste
        parent::setUP();

        $temporada = new Temporada();
        $episodio1 = new Episodio();
        $episodio1->assistiu = true;

        $episodio2 = new Episodio();
        $episodio2->assistiu = false;

        $episodio3 = new Episodio();
        $episodio3->assistiu = true;

        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $episodiosAssistidos = $this->temporada->getEpisodiosAssistidos();

        $this->assertCount(2, $episodiosAssistidos);

        foreach($episodiosAssistidos as $episodioAssistido){
            $this->assertTrue($episodioAssistido->assistiu);
        }
    }

    public function testBuscaTodosOsEpisodios()
    {
        $episodios = $this->temporada->episodios;

        $this->assertCount(3, $episodios);

    }
}
