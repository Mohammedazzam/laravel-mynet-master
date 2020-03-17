<?php

namespace App\Http\Controllers;

use App\Category;
use App\Movie;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('movies')->get();
        $latest_movies = Movie::latest()->limit(2)->get();
        return view('welcome', compact('latest_movies','categories'));

    }// end of index

}//end of controller
