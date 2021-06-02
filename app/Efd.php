<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efd extends Model
{
    //
    protected $table = 'efds';

    protected $fillable = [
        'modality','instructor_id','path'
    ];

    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}

