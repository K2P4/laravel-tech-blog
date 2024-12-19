<?php


use Illuminate\Support\Facades\Route;
use App\Models\Blog;

Route::get('/',function(){
    
    return view('blogs',['blogs' => Blog::all()]);

});


Route::get('/blogs/{id}',function($id){
     
    return view('blog',
    ['blog' =>Blog::findorFail($id)

    ]);

})->where('blog','[A-z\d\-_]+' );