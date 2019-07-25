<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $fillable = [
        'comment'
    ];

    public function comment_votes()
    {
        return $this->hasMany('App\ProductCommentVote');
    }
}
