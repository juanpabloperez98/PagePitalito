<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Efd_Schedule extends Model
{
    //
    protected $table = 'efd_schedule';

    protected $fillable = [
        'efd_id','schedule_id'
    ];
}
