<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\BespokeSection; // <-- Pastikan ini ada
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::featured()->get();
        $allProducts = Product::active()->get();
        $reviews = Review::active()->get();
        $bespokeSection = BespokeSection::active()->first(); // <-- Pastikan ini ada

        return view('home', compact(
            'featuredProducts', 
            'allProducts', 
            'reviews', 
            'bespokeSection' // <-- Pastikan ini ada di compact
        ));
    }
}