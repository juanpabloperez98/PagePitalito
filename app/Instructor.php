<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    //
    protected $table = 'instructors';

    protected $fillable = [
        'first_name','last_name','cell_phone','perfil','profile_photo'
    ];

    public function efd(){
        return $this->hasOne(Efd::class);
    }
}
