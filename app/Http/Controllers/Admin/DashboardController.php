<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek autentikasi tanpa middleware
        if (!AuthController::checkAdmin()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $products = Product::orderBy('sort_order')->get();
        $reviews = Review::orderBy('created_at', 'desc')->get();
        
        return view('admin.dashboard', compact('products', 'reviews'));
    }
}