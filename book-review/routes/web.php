<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   $books = App\Models\Book::with('reviews')->get();

   foreach($books as $book){
    var_dump($book->title);
   }
});
