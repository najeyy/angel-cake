<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::featured()->get();
        $allProducts = Product::active()->get();
        $reviews = Review::active()->get();

        return view('home', compact('featuredProducts', 'allProducts', 'reviews'));
    }
}