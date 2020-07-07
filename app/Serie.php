<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model {

    public $timestamps = false;
    //por padrão o Laravel inclui os campos de quando foi criado e quando foi feita a última alteração
    //passando o atributo $timestamps como false, impedimos que os mesmos tenham o preenchimento como obrigatório

    protected $fillable = ['nome']; //Defino o que é preenchivel

    //hasMany - Relação de Um para muitos
    public function temporadas(){
        return $this->hasMany(Temporada::class);
    }
}
