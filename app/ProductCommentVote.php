<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCommentVote extends Model
{
    protected $fillable = [
        'type'
    ];

    public function scopeUpvote($query)
    {
        return $query->where('type', 'upvote');
    }

    public function scopeDownvote($query)
    {
        return $query->where('type', 'downvote');
    }
}
