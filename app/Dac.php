<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dac extends Model
{
    //
    protected $table = 'dacs';
    protected $fillable = [
        'subcategory','name','cell_phone','address','email','link_socialnetwork','path'
    ];
    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

}
