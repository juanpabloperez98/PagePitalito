<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $table = 'schedules';

    protected $fillable = [
        'day','start','end'
    ];

    public function efds(){
        return $this->belongsToMany(Efd::class);
    }
}
