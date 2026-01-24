@extends('layout.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">Bespoke Sections</h1>
        <a href="{{ route('admin.bespoke-sections.create') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
            + Add New Section
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($sections as $section)
                <tr>
                    <td class="px-6 py-4">{{ $section->id }}</td>
                    <td class="px-6 py-4">{{ $section->title }}</td>
                    <td class="px-6 py-4">
                        @if($section->image)
                            <img src="{{ asset('storage/' . $section->image) }}" class="w-20 h-20 object-cover rounded">
                        @else
                            <span class="text-gray-400">No image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs {{ $section->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">{{ $section->order }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.bespoke-sections.edit', $section) }}" 
                           class="text-blue-600 hover:text-blue-900">Edit</a>
                        <form action="{{ route('admin.bespoke-sections.destroy', $section) }}" 
                              method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection