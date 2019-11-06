<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = "posts";

    protected $fillable = [
        'title',
        'summary',
        'content',
        'per_id',
        'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function person()
    {
        return $this->belongsTo('App\Person', 'per_id');
    }
}
