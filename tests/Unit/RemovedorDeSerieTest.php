<?php

namespace Tests\Unit;

use App\Services\SerieService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase; //Faz a limpeza e executa as Migrations

    private $serie;

    protected function setUP() : void
    {
        //É executado antes de cada Teste
        parent::setUP();
        $criadorDeSerie = new SerieService();
        $this->serie = $criadorDeSerie->criarSerie("Teste", 1, 1);
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRemoverUmaSerie()
    {
        //Verifica se o valor inserido está realmente lá
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);

        $removedorDeSerie = new SerieService();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);

        //Verifica se o valor retornado foi uma String
        $this->assertIsString($nomeSerie);

        //Verifica se o nome inserido é igual ao valor indicado
        $this->assertEquals("Teste", $this->serie->nome);

        //Garante que não existe mais no Banco de Dados essa série que foi excluida
        $this->assertDatabaseMissing("series", ['id' => $this->serie->id]); //

    }
}
