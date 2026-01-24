<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BespokeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BespokeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = BespokeSection::ordered()->get();
        return view('admin.bespoke-sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bespokeSection = new BespokeSection();
        $bespokeSection->features = [ // Default empty features
            ['value' => '', 'label' => ''],
            ['value' => '', 'label' => ''],
            ['value' => '', 'label' => '']
        ];
        return view('admin.bespoke-sections.create', compact('bespokeSection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'image_label' => 'required|string|max:255',
                'is_active' => 'boolean',
                'order' => 'nullable|integer|min:0',
            ]);

            // Handle features validation separately
            $features = [];
            for ($i = 0; $i < 3; $i++) {
                $request->validate([
                    "features.$i.value" => 'required|string|max:100',
                    "features.$i.label" => 'required|string|max:100',
                ]);
                
                $features[] = [
                    'value' => $request->input("features.$i.value"),
                    'label' => $request->input("features.$i.label")
                ];
            }

            $validated['features'] = $features;

            // Upload image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('bespoke-sections', 'public');
            }

            // Ensure is_active is set
            $validated['is_active'] = $request->has('is_active');

            BespokeSection::create($validated);

            return redirect()->route('admin.bespoke-sections.index')
                ->with('success', 'Bespoke section created successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BespokeSection $bespokeSection)
    {
        // Decode features if they're not already an array
        if (is_string($bespokeSection->features)) {
            $bespokeSection->features = json_decode($bespokeSection->features, true);
        }
        
        // Ensure we have exactly 3 features
        if (is_array($bespokeSection->features)) {
            $bespokeSection->features = array_slice($bespokeSection->features, 0, 3);
            while (count($bespokeSection->features) < 3) {
                $bespokeSection->features[] = ['value' => '', 'label' => ''];
            }
        } else {
            $bespokeSection->features = [
                ['value' => '', 'label' => ''],
                ['value' => '', 'label' => ''],
                ['value' => '', 'label' => '']
            ];
        }

        return view('admin.bespoke-sections.edit', compact('bespokeSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BespokeSection $bespokeSection)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'image_label' => 'required|string|max:255',
                'is_active' => 'boolean',
                'order' => 'nullable|integer|min:0',
            ]);

            // Handle features
            $features = [];
            for ($i = 0; $i < 3; $i++) {
                $request->validate([
                    "features.$i.value" => 'required|string|max:100',
                    "features.$i.label" => 'required|string|max:100',
                ]);
                
                $features[] = [
                    'value' => $request->input("features.$i.value"),
                    'label' => $request->input("features.$i.label")
                ];
            }

            $validated['features'] = $features;

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image
                if ($bespokeSection->image) {
                    Storage::disk('public')->delete($bespokeSection->image);
                }
                $validated['image'] = $request->file('image')->store('bespoke-sections', 'public');
            }

            // Ensure is_active is set
            $validated['is_active'] = $request->has('is_active');

            $bespokeSection->update($validated);

            return redirect()->route('admin.bespoke-sections.index')
                ->with('success', 'Bespoke section updated successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BespokeSection $bespokeSection)
    {
        try {
            if ($bespokeSection->image) {
                Storage::disk('public')->delete($bespokeSection->image);
            }
            
            $bespokeSection->delete();

            return redirect()->route('admin.bespoke-sections.index')
                ->with('success', 'Bespoke section deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}