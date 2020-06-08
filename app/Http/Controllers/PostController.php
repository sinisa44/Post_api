<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


        public function seed() {
            if( ! sizeof( Post::all() ) > 0 ) {
                Post::seed();
            }else{
                return 'data already exists in table';
            }
        }
    

    //
}
