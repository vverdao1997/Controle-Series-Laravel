<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];


    //belongsTo - Relacionamento: Um para muitos
    //Representa que uma Temporada pode estar associada a vários Episodios
    public function episodios(){
        return $this->hasMany(Episodio::class);
    }

    //belongsTo - Relacionamento: Um a um
    //Representa que uma Temporada está associada a uma Série
    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function getEpisodiosAssistidos() : Collection
    {

        return $this->episodios->filter(function(Episodio $episodio){
            return $episodio->assistiu;
        });
    }
}
