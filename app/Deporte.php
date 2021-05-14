<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    //
    public function horario(){
        // relacion muchos a muchos
        return $this->belongsToMany(Horario::class);
    }
}
