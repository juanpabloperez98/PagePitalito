<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $fillable = [
        'user_id','name','slug','excerpt','body','status','file'
    ];

    public function user(){
        // Relación le pertenece
        return $this->belongsTo(User::class);
    }
}
