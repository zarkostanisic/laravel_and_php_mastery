<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "ss";
        $books = Book::with('reviews')
            ->withCount('reviews')
            ->title($title)
            ->highestRated('2024-03-18', '2024-03-18')
            ->minReviews(10)
            ->get();

        return  BookResource::collection($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
