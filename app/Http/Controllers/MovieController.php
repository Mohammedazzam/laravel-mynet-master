<?php

namespace App\Http\Controllers;

use App\Movie;

class MovieController extends Controller
{
    public function index()
    {

    }// end of index

    public function show(Movie $movie)
    {
        $related_movies = Movie::where('id', '!=', $movie->id)
            ->whereHas('categories', function ($query) use ($movie) {
                return $query->whereIn('category_id', $movie->categories->pluck('id')->toArray());
            })->get();

        return view('movies.show', compact('movie', 'related_movies'));

    }// end of show


    public function increment_views(Movie $movie)
    {
        $movie->increment('views');

    }// end of increment_views



}//end of controller
