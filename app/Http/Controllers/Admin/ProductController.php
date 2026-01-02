<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);
        
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $product = Product::findOrFail($id);
        
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Produk berhasil dihapus!');
    }

    public function toggleFeatured($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $product = Product::findOrFail($id);
        $product->is_featured = !$product->is_featured;
        $product->save();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Status featured berhasil diubah!');
    }

    public function updateOrder(Request $request)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        foreach ($request->order as $index => $id) {
            Product::where('id', $id)->update(['sort_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}