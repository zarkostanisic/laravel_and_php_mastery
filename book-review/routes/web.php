<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   $title = "ss";
   $books = App\Models\Book::with('reviews')
      ->withCount('reviews')
      ->popular()
      ->highestRated()
      ->title($title)
      // ->limit(3)
      // ->withAvg('reviews', 'rating')
      // ->orderBy('reviews_avg_rating', 'desc')
      // ->having('reviews_count', '>=', 6)
      ->get();

   foreach($books as $book){
    var_dump($book->title, $book->reviews_count, $book->reviews_avg_rating, '<br/>');
   }
});
