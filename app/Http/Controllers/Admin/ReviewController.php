<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Helper method untuk cek autentikasi
     */
    private function checkAuth()
    {
        if (!AuthController::checkAdmin()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return null;
    }

    public function store(Request $request)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $request->validate([
            'customer_name' => 'required|max:255',
            'review' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        Review::create($request->all());

        return redirect()->route('admin.dashboard')
            ->with('success', 'Review berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $review = Review::findOrFail($id);
        
        $request->validate([
            'customer_name' => 'required|max:255',
            'review' => 'required',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review->update($request->all());

        return redirect()->route('admin.dashboard')
            ->with('success', 'Review berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Review berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $review = Review::findOrFail($id);
        $review->is_active = !$review->is_active;
        $review->save();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Status review berhasil diubah!');
    }
}