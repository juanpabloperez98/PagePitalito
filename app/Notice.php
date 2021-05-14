<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $fillable = [
        'name','body','status','file'
    ];

    public function user(){
        // Relación le pertenece
        return $this->belongsTo(User::class);
    }
}
