<?php

namespace App\Services;
use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

class SerieService{

    /**
     * @param int $nomeSerie
     * @param int $nomeqtdTemporadasSerie
     * @param int $qtdEpisodios
     */
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $qtdEpisodios) : Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($qtdTemporadas, $qtdEpisodios, $serie);
        DB::commit();

        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $qtdEpisodios, Serie $serie){
        for($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['serie_id' => $serie->id,'numero' => $i]);
            $this->criaEpisodios($qtdEpisodios, $temporada);
        }
    }

    private function criaEpisodios(int $qtdEpisodios, Temporada $temporada){
        for($j = 1; $j <= $qtdEpisodios; $j++){
            $temporada->episodios()->create(['numero' => $j,'temporada_id' => $temporada->id]);
        }
    }


    public function removerSerie(int $serieId) : string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;

            $this->removerTemporadas($serie);
            $serie->delete();
        });


        return $nomeSerie;
    }


    private function removerTemporadas(Serie $serie) : void
    {
        $serie->temporadas->each(function(Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });

    }

    private function removerEpisodios(Temporada $temporada) : void
    {
        $temporada->episodios->each(function(Episodio $episodio){
            $episodio->delete();
        });
    }

}
