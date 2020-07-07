<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    //belongsTo - Relacionamento: Um a um
    //Representa que um Episodio esta associado a uma Temporada
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
