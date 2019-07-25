<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'type_price', 'special_price', 'old_price', 'price', 'images', 'link_url'
    ];
    protected $casts = [
        'images' => 'array'
    ];

    public function comments()
    {
        return $this->hasMany('App\ProductComment');
    }
}
