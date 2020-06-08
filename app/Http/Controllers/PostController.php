<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use PDOException;

class PostController extends Controller
{

    public $messages = [
        'title.required'  => 'Title is required',
        'author.required' => 'Author is requrired',
        'text.requierd'   => 'Text is required' 
    ];

    public function index() {
        $posts = Post::all();

        return response()->json( $posts->toArray() );
    }

    public function show( $id ){
        $post = Post::find( $id );

        if( ! $post )
            abort( 404 );

        return response()->json( $post );
    }

    public function create( Request $request ){
        $this->validate( $request, [
            'title'   => 'required|min:3',
            'author'  => 'required',
            'text'    => 'required|min:125'
        ], $this->messages );

        try{
            $post = Post::create( $request->all() );
        }catch( PDOException $e ) {
            return response()->json( ['error' => $e] );
        }

        return response()->json( $post );
    }

    public function update( $id, Request $request ){
        $this->validate( $request, [
            'title'  => 'required|min:3',
            'author' => 'required',
            'text'   => 'required|min:125'
        ]);

        $post = Post::find( $id );

        if( ! $post ) 
            abort( 404 );

        try{
            $post->update( $request->all() );
        }catch( PDOException $e ) {
            return response()->json( ['error' => $e] );
        }

        return response()->json( $post );
    }

    public function delete( $id ){
        $post = Post::find( $id );

        if( ! $post )
            abort( 404 );

        try {
            $post->delete();
        } catch ( PDOException $e ) {
            return response()->json( ['error' => $e ] ); 
        }

        return response()->json( ['OK'] );
    }

    public function seed() {
        if( ! sizeof( Post::all() ) > 0 ) {
            Post::seed();
        }else{
            return 'data already exists in table';
        }
    }
}
