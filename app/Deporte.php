<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    //
    public function horarios(){
        // relacion muchos a muchos
        return $this->belongsToMany(Horario::class);
    }
}
