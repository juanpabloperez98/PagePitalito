<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dac extends Model
{
    //
    protected $fillable = [
        'category','subcategory','name','cell_phone','address','email','link_socialnetwork','path'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
