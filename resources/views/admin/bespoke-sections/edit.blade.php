@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Edit Bespoke Section</h1>

    <form action="{{ route('admin.bespoke-sections.update', $bespokeSection) }}" 
          method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Column -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $bespokeSection->title) }}" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Subtitle</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $bespokeSection->subtitle) }}" 
                           class="w-full px-4 py-2 border rounded-lg">
                    @error('subtitle')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Description *</label>
                    <textarea name="description" rows="4" 
                              class="w-full px-4 py-2 border rounded-lg" required>{{ old('description', $bespokeSection->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Image Label *</label>
                    <input type="text" name="image_label" value="{{ old('image_label', $bespokeSection->image_label) }}" 
                           class="w-full px-4 py-2 border rounded-lg" required>
                    @error('image_label')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Image</label>
                    @if($bespokeSection->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $bespokeSection->image) }}" 
                                 class="w-full h-64 object-cover rounded-lg mb-2">
                            <p class="text-sm text-gray-500">Current image</p>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" 
                           class="w-full px-4 py-2 border rounded-lg">
                    <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">Order</label>
                    <input type="number" name="order" value="{{ old('order', $bespokeSection->order ?? 0) }}" 
                           class="w-full px-4 py-2 border rounded-lg">
                    @error('order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           {{ old('is_active', $bespokeSection->is_active) ? 'checked' : '' }}
                           class="mr-2">
                    <label for="is_active" class="text-sm">Active</label>
                    @error('is_active')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="border-t pt-6">
            <h3 class="text-lg font-medium mb-4">Features (3 items)</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $features = json_decode($bespokeSection->features, true) ?? [];
                @endphp
                
                @for($i = 0; $i < 3; $i++)
                @php
                    $feature = $features[$i] ?? ['value' => '', 'label' => ''];
                @endphp
                <div class="border p-4 rounded-lg">
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-2">Value {{ $i+1 }} *</label>
                        <input type="text" name="features[{{ $i }}][value]" 
                               value="{{ old('features.'.$i.'.value', $feature['value']) }}"
                               class="w-full px-4 py-2 border rounded-lg" required>
                        @error('features.'.$i.'.value')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Label {{ $i+1 }} *</label>
                        <input type="text" name="features[{{ $i }}][label]" 
                               value="{{ old('features.'.$i.'.label', $feature['label']) }}"
                               class="w-full px-4 py-2 border rounded-lg" required>
                        @error('features.'.$i.'.label')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.bespoke-sections.index') }}" 
               class="px-6 py-3 border rounded-lg hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" 
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Bespoke Section
            </button>
        </div>
    </form>
</div>
@endsection