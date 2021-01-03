<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    //
    protected $fillable = [
        'day','start','finish'
    ];

    public function deportes(){
        // relacion muchos a muchos
        return $this->belongsToMany(Deporte::class);
    }
}
