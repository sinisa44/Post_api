<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    
    protected $guarded = [];


    public static function seed() {
        factory( Post::class, 200 )->create();
    }
}