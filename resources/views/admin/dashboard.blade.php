<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Angel Cake</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-gold: #E8B86D;
            --color-dark-gold: #C9994A;
            --color-cream: #FFF8E7;
            --color-bg-dark: #0F0F0F;
            --color-bg-medium: #1A1A1A;
            --color-bg-light: #252525;
            --color-border: #2A2A2A;
        }
        
        body {
            background-color: #0F0F0F;
            color: #F5F5F5;
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
        }
        
        .elegant-font {
            font-family: 'Playfair Display', serif;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Sidebar Elegant */
        .sidebar {
            background: linear-gradient(180deg, #111111 0%, #0F0F0F 100%);
            border-right: 1px solid var(--color-border);
        }
        
        /* Topbar */
        .topbar {
            background: rgba(15, 15, 15, 0.95);
            border-bottom: 1px solid var(--color-border);
            backdrop-filter: blur(10px);
        }
        
        /* Elegant Card Design */
        .elegant-card {
            background: linear-gradient(145deg, #1A1A1A 0%, #151515 100%);
            border: 1px solid var(--color-border);
            position: relative;
            overflow: hidden;
        }
        
        .elegant-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .elegant-card:hover::before {
            opacity: 0.5;
        }
        
        /* Premium Button Styles */
        .btn-premium {
            position: relative;
            background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
            color: #0F0F0F;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            overflow: hidden;
        }
        
        .btn-premium::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.6s ease;
        }
        
        .btn-premium:hover::before {
            left: 100%;
        }
        
        .btn-premium:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(232, 184, 109, 0.25);
        }
        
        .btn-premium:active {
            transform: translateY(0);
        }
        
        /* Outline Button */
        .btn-outline-elegant {
            background: transparent;
            border: 1px solid var(--color-gold);
            color: var(--color-gold);
            transition: all 0.3s ease;
        }
        
        .btn-outline-elegant:hover {
            background: rgba(232, 184, 109, 0.1);
            transform: translateY(-1px);
        }
        
        /* Action Buttons */
        .btn-action {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }
        
        .btn-action.edit {
            background: rgba(59, 130, 246, 0.1);
            color: #60A5FA;
            border-color: rgba(59, 130, 246, 0.2);
        }
        
        .btn-action.edit:hover {
            background: rgba(59, 130, 246, 0.2);
            transform: translateY(-1px);
        }
        
        .btn-action.featured {
            background: rgba(234, 179, 8, 0.1);
            color: #FBBF24;
            border-color: rgba(234, 179, 8, 0.2);
        }
        
        .btn-action.featured:hover {
            background: rgba(234, 179, 8, 0.2);
            transform: translateY(-1px);
        }
        
        .btn-action.delete {
            background: rgba(239, 68, 68, 0.1);
            color: #F87171;
            border-color: rgba(239, 68, 68, 0.2);
        }
        
        .btn-action.delete:hover {
            background: rgba(239, 68, 68, 0.2);
            transform: translateY(-1px);
        }
        
        /* Navigation Items */
        .nav-item {
            position: relative;
            color: #A0A0A0;
            transition: all 0.3s ease;
            padding-left: 1.5rem;
        }
        
        .nav-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: var(--color-gold);
            border-radius: 0 2px 2px 0;
            transition: height 0.3s ease;
        }
        
        .nav-item:hover {
            color: #FFFFFF;
        }
        
        .nav-item:hover::before {
            height: 60%;
        }
        
        .nav-item.active {
            color: #FFFFFF;
        }
        
        .nav-item.active::before {
            height: 100%;
        }
        
        /* Input Fields */
        .input-elegant {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--color-border);
            color: #FFFFFF;
            transition: all 0.3s ease;
        }
        
        .input-elegant:focus {
            border-color: var(--color-gold);
            background: rgba(255, 255, 255, 0.05);
            outline: none;
            box-shadow: 0 0 0 2px rgba(232, 184, 109, 0.1);
        }
        
        /* Status Badges */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
        }
        
        .status-active {
            background: rgba(34, 197, 94, 0.1);
            color: #4ADE80;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        
        .status-inactive {
            background: rgba(239, 68, 68, 0.1);
            color: #F87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        /* Product Card */
        .product-card {
            background: linear-gradient(145deg, #1A1A1A 0%, #151515 100%);
            border: 1px solid var(--color-border);
            transition: all 0.3s ease;
        }
        
        .product-card:hover {
            border-color: rgba(232, 184, 109, 0.3);
            transform: translateY(-2px);
        }
        
        /* Table Design */
        .elegant-table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .elegant-table thead {
            background: rgba(255, 255, 255, 0.02);
        }
        
        .elegant-table th {
            border-bottom: 1px solid var(--color-border);
            font-weight: 500;
            color: #A0A0A0;
        }
        
        .elegant-table td {
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        .elegant-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #1A1A1A;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #333333;
            border-radius: 3px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #444444;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        
        /* Text Colors */
        .text-muted {
            color: #A0A0A0;
        }
        
        .text-gold {
            color: var(--color-gold);
        }
        
        .border-subtle {
            border-color: var(--color-border);
        }
        
        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-border), transparent);
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Main Layout -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="sidebar w-64 flex-shrink-0">
            <div class="p-6">
                <!-- Logo -->
                <div class="flex items-center gap-3 mb-10 pb-6 border-b border-subtle">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-600/20 to-transparent border border-amber-600/30 rounded-xl flex items-center justify-center">
                        <i class="fas fa-crown text-amber-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold elegant-font gradient-text">Angel Cake</h2>
                        <p class="text-muted text-xs">Admin Portal</p>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-item active flex items-center gap-3 py-3 rounded-lg">
                        <i class="fas fa-tachometer-alt w-5 text-center"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <button onclick="toggleSection('products')"
                            class="w-full nav-item flex items-center justify-between py-3 rounded-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-birthday-cake w-5 text-center"></i>
                            <span>Products</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-muted"></i>
                    </button>
                    
                    <button onclick="toggleSection('reviews')"
                            class="w-full nav-item flex items-center justify-between py-3 rounded-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-star w-5 text-center"></i>
                            <span>Reviews</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-muted"></i>
                    </button>

                    <button onclick="toggleSection('bespoke')"
                            class="w-full nav-item flex items-center justify-between py-3 rounded-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-gem w-5 text-center"></i>
                            <span>Bespoke Section</span>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-muted"></i>
                    </button>
                </nav>
                
                <!-- Logout -->
                <div class="mt-auto pt-10">
                    <div class="divider mb-6"></div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="w-full nav-item flex items-center gap-3 py-3 rounded-lg text-muted hover:text-red-400">
                            <i class="fas fa-sign-out-alt w-5 text-center"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Topbar -->
            <header class="topbar px-8 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold elegant-font">Dashboard Overview</h1>
                        <p class="text-muted text-sm">Manage your premium bakery products & reviews</p>
                    </div>
                    
                    <div class="flex items-center gap-4">
                        <a href="{{ route('home') }}" target="_blank"
                           class="btn-premium px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Website</span>
                        </a>
                        
                        <div class="w-10 h-10 rounded-lg border border-subtle flex items-center justify-center">
                            <i class="fas fa-user text-muted"></i>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Main Content -->
            <main class="flex-1 p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-gradient-to-r from-emerald-500/10 to-green-500/10 border border-emerald-500/20 rounded-lg animate-fade-in">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-check-circle text-emerald-500"></i>
                            <p class="text-emerald-400">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif
                
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                    <!-- Total Products -->
                    <div class="elegant-card rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-muted text-sm mb-2">Total Products</p>
                                <p class="text-3xl font-bold elegant-font gradient-text">{{ $products->count() }}</p>
                                <p class="text-xs text-muted mt-1">Premium collection</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-600/10 to-transparent border border-amber-600/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-birthday-cake text-amber-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured -->
                    <div class="elegant-card rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-muted text-sm mb-2">Featured</p>
                                <p class="text-3xl font-bold elegant-font gradient-text">{{ $products->where('is_featured', true)->count() }}</p>
                                <p class="text-xs text-muted mt-1">Signature items</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-600/10 to-transparent border border-amber-600/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-crown text-amber-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Reviews -->
                    <div class="elegant-card rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-muted text-sm mb-2">Reviews</p>
                                <p class="text-3xl font-bold elegant-font gradient-text">{{ $reviews->count() }}</p>
                                <p class="text-xs text-muted mt-1">Customer feedback</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-600/10 to-transparent border border-amber-600/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-star text-amber-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Bespoke Sections -->
                    <div class="elegant-card rounded-xl p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-muted text-sm mb-2">Bespoke</p>
                                <p class="text-3xl font-bold elegant-font gradient-text">{{ $bespokeSections->count() }}</p>
                                <p class="text-xs text-muted mt-1">Custom sections</p>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-amber-600/10 to-transparent border border-amber-600/20 rounded-xl flex items-center justify-center">
                                <i class="fas fa-gem text-amber-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Products Section -->
                <div id="products-section" class="mb-12">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold elegant-font mb-2">Product Management</h2>
                            <p class="text-muted">Craft and manage your premium cake collection</p>
                        </div>
                        <button onclick="showProductForm()"
                                class="btn-premium px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>New Product</span>
                        </button>
                    </div>
                    
                    <!-- Add/Edit Form -->
                    <div id="product-form-container" class="hidden mb-8 animate-fade-in">
                        <div class="elegant-card rounded-xl p-8">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-xl font-bold elegant-font" id="product-form-title">Add New Product</h3>
                                <button onclick="hideProductForm()"
                                        class="text-muted hover:text-white transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                            
                            <form id="product-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store') }}">
                                @csrf
                                <input type="hidden" name="_method" id="product_form_method" value="POST">
                                <input type="hidden" name="product_id" id="product_id">
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Product Name</label>
                                        <input type="text" name="name" id="product_name" required
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Price (Rp)</label>
                                        <input type="number" name="price" id="product_price" required min="0"
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Description</label>
                                        <textarea name="description" id="product_description" required rows="3"
                                                  class="w-full input-elegant rounded-lg px-4 py-3"></textarea>
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Product Image</label>
                                        <input type="file" name="image" id="product_image"
                                               class="w-full input-elegant rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-amber-600 file:text-white hover:file:bg-amber-700 transition-colors"
                                               accept="image/*">
                                        <div id="product_image_preview" class="mt-6"></div>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end gap-3 mt-10">
                                    <button type="button" onclick="hideProductForm()"
                                            class="btn-outline-elegant px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="btn-premium px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Save Product
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Featured Products -->
                    <div class="elegant-card rounded-xl overflow-hidden mb-8">
                        <div class="p-8">
                            <div class="flex items-center justify-between mb-8">
                                <div>
                                    <h4 class="font-bold text-lg elegant-font mb-2">Featured Collection</h4>
                                    <p class="text-sm text-muted">Drag to reorder featured items</p>
                                </div>
                                <span class="px-4 py-2 bg-amber-600/10 text-amber-600 text-sm font-medium rounded-lg border border-amber-600/20">
                                    {{ $products->where('is_featured', true)->count() }} items
                                </span>
                            </div>
                            
                            <div id="featured-products" class="space-y-4">
                                @foreach($products->where('is_featured', true) as $product)
                                <div class="flex items-center justify-between p-5 bg-gradient-to-r from-amber-600/5 to-transparent rounded-xl border border-amber-600/10"
                                     data-id="{{ $product->id }}">
                                    <div class="flex items-center gap-5">
                                        <div class="w-20 h-20 rounded-lg overflow-hidden border border-subtle">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" 
                                                     alt="{{ $product->name }}"
                                                     class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full bg-gradient-to-br from-amber-600/10 to-transparent flex items-center justify-center">
                                                    <i class="fas fa-birthday-cake text-amber-600/40 text-2xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="font-medium elegant-font text-lg mb-1">{{ $product->name }}</h5>
                                            <p class="text-sm text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button onclick="editProduct({{ json_encode($product) }})"
                                                class="btn-action edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <form action="{{ route('admin.products.toggle-featured', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                    class="btn-action featured">
                                                <i class="fas fa-star"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this product?')"
                                                    class="btn-action delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <div class="w-8 h-8 flex items-center justify-center text-muted cursor-move hover:text-white">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- All Products -->
                    <div class="elegant-card rounded-xl overflow-hidden">
                        <div class="p-8">
                            <h4 class="font-bold text-lg elegant-font mb-8">All Products</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($products->where('is_featured', false) as $product)
                                <div class="product-card rounded-lg p-5">
                                    <div class="relative h-48 rounded-lg overflow-hidden mb-5">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 alt="{{ $product->name }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-amber-600/5 to-transparent flex items-center justify-center">
                                                <i class="fas fa-birthday-cake text-amber-600/30 text-3xl"></i>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                                    </div>
                                    <h5 class="font-medium elegant-font mb-2 truncate">{{ $product->name }}</h5>
                                    <p class="text-sm text-muted mb-4 line-clamp-2">{{ Str::limit($product->description, 80) }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="font-medium text-gold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        <div class="flex items-center gap-2">
                                            <button onclick="editProduct({{ json_encode($product) }})"
                                                    class="btn-action edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('admin.products.toggle-featured', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="btn-action featured">
                                                    <i class="far fa-star"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Delete this product?')"
                                                        class="btn-action delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reviews Section -->
                <div id="reviews-section" class="hidden">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold elegant-font mb-2">Customer Reviews</h2>
                            <p class="text-muted">Manage and showcase customer feedback</p>
                        </div>
                        <button onclick="showReviewForm()"
                                class="btn-premium px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>New Review</span>
                        </button>
                    </div>
                    
                    <!-- Add/Edit Form -->
                    <div id="review-form-container" class="hidden mb-8 animate-fade-in">
                        <div class="elegant-card rounded-xl p-8">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-xl font-bold elegant-font" id="review-form-title">Add New Review</h3>
                                <button onclick="hideReviewForm()"
                                        class="text-muted hover:text-white transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                            
                            <form id="review-form" method="POST" action="{{ route('admin.reviews.store') }}">
                                @csrf
                                <input type="hidden" name="_method" id="review_form_method" value="POST">
                                <input type="hidden" name="review_id" id="review_id">
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Customer Name</label>
                                        <input type="text" name="customer_name" id="review_customer_name" required
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Rating</label>
                                        <select name="rating" id="review_rating" required
                                                class="w-full input-elegant rounded-lg px-4 py-3">
                                            <option value="5">★★★★★ - Excellent</option>
                                            <option value="4">★★★★☆ - Very Good</option>
                                            <option value="3">★★★☆☆ - Good</option>
                                            <option value="2">★★☆☆☆ - Fair</option>
                                            <option value="1">★☆☆☆☆ - Poor</option>
                                        </select>
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Review Text</label>
                                        <textarea name="review" id="review_text" required rows="3"
                                                  class="w-full input-elegant rounded-lg px-4 py-3"></textarea>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end gap-3 mt-10">
                                    <button type="button" onclick="hideReviewForm()"
                                            class="btn-outline-elegant px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="btn-premium px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Save Review
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Reviews Table -->
                    <div class="elegant-card rounded-xl overflow-hidden">
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full elegant-table">
                                <thead>
                                    <tr>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Customer</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Rating</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Review</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Status</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $review)
                                    <tr>
                                        <td class="px-8 py-5">
                                            <div class="font-medium">{{ $review->customer_name }}</div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <div class="text-amber-600 flex items-center gap-1">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->rating)
                                                        <i class="fas fa-star text-sm"></i>
                                                    @else
                                                        <i class="far fa-star text-sm"></i>
                                                    @endif
                                                @endfor
                                                <span class="text-muted text-sm ml-2">({{ $review->rating }})</span>
                                            </div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <div class="text-sm text-muted max-w-md">{{ Str::limit($review->review, 100) }}</div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <span class="status-badge {{ $review->is_active ? 'status-active' : 'status-inactive' }}">
                                                <i class="fas fa-circle text-xs"></i>
                                                {{ $review->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-2">
                                                <button onclick="editReview({{ json_encode($review) }})"
                                                        class="btn-action edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.reviews.toggle-status', $review->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn-action featured">
                                                        <i class="fas fa-toggle-{{ $review->is_active ? 'on' : 'off' }}"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete this review?')"
                                                            class="btn-action delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Bespoke Section -->
                <div id="bespoke-section" class="hidden">
                    <!-- Header -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold elegant-font mb-2">Bespoke Section</h2>
                            <p class="text-muted">Customize the Bespoke Creations section on homepage</p>
                        </div>
                        <button onclick="showBespokeForm()"
                                class="btn-premium px-5 py-2.5 rounded-lg text-sm font-medium flex items-center gap-2">
                            <i class="fas fa-plus"></i>
                            <span>New Bespoke</span>
                        </button>
                    </div>
                    
                    <!-- Add/Edit Form -->
                    <div id="bespoke-form-container" class="hidden mb-8 animate-fade-in">
                        <div class="elegant-card rounded-xl p-8">
                            <div class="flex items-center justify-between mb-8">
                                <h3 class="text-xl font-bold elegant-font" id="bespoke-form-title">Add New Bespoke</h3>
                                <button onclick="hideBespokeForm()"
                                        class="text-muted hover:text-white transition-colors">
                                    <i class="fas fa-times text-lg"></i>
                                </button>
                            </div>
                            
                            <form id="bespoke-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.bespoke-sections.store') }}">
                                @csrf
                                <input type="hidden" name="_method" id="bespoke_form_method" value="POST">
                                <input type="hidden" name="bespoke_id" id="bespoke_id">
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Title</label>
                                        <input type="text" name="title" id="bespoke_title" required
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Subtitle</label>
                                        <input type="text" name="subtitle" id="bespoke_subtitle"
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Description</label>
                                        <textarea name="description" id="bespoke_description" required rows="3"
                                                  class="w-full input-elegant rounded-lg px-4 py-3"></textarea>
                                    </div>
                                    
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Image</label>
                                        <input type="file" name="image" id="bespoke_image"
                                               class="w-full input-elegant rounded-lg px-4 py-3 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-medium file:bg-amber-600 file:text-white hover:file:bg-amber-700 transition-colors"
                                               accept="image/*">
                                        <div id="bespoke_image_preview" class="mt-6"></div>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Image Label</label>
                                        <input type="text" name="image_label" id="bespoke_image_label" required
                                               value="THE GOLDEN TIER"
                                               class="w-full input-elegant rounded-lg px-4 py-3">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-muted mb-3">Order</label>
                                        <input type="number" name="order" id="bespoke_order"
                                               class="w-full input-elegant rounded-lg px-4 py-3" value="0">
                                    </div>
                                    
                                    <!-- Features -->
                                    <div class="md:col-span-2">
                                        <label class="block text-sm font-medium text-muted mb-3">Features (3 items)</label>
                                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                            <!-- Feature 1 -->
                                            <div>
                                                <label class="block text-xs text-muted mb-2">Feature 1 Value</label>
                                                <input type="text" name="features[0][value]" id="bespoke_feature1_value" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                                <label class="block text-xs text-muted mb-2 mt-2">Feature 1 Label</label>
                                                <input type="text" name="features[0][label]" id="bespoke_feature1_label" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                            </div>
                                            
                                            <!-- Feature 2 -->
                                            <div>
                                                <label class="block text-xs text-muted mb-2">Feature 2 Value</label>
                                                <input type="text" name="features[1][value]" id="bespoke_feature2_value" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                                <label class="block text-xs text-muted mb-2 mt-2">Feature 2 Label</label>
                                                <input type="text" name="features[1][label]" id="bespoke_feature2_label" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                            </div>
                                            
                                            <!-- Feature 3 -->
                                            <div>
                                                <label class="block text-xs text-muted mb-2">Feature 3 Value</label>
                                                <input type="text" name="features[2][value]" id="bespoke_feature3_value" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                                <label class="block text-xs text-muted mb-2 mt-2">Feature 3 Label</label>
                                                <input type="text" name="features[2][label]" id="bespoke_feature3_label" required
                                                       class="w-full input-elegant rounded-lg px-4 py-2 text-sm">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center">
                                        <input type="checkbox" name="is_active" id="bespoke_is_active" value="1"
                                               class="mr-2 rounded border-subtle bg-transparent">
                                        <label for="bespoke_is_active" class="text-sm text-muted">Active</label>
                                    </div>
                                </div>
                                
                                <div class="flex justify-end gap-3 mt-10">
                                    <button type="button" onclick="hideBespokeForm()"
                                            class="btn-outline-elegant px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="btn-premium px-6 py-2.5 rounded-lg text-sm font-medium">
                                        Save Bespoke
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Bespoke List -->
                    <div class="elegant-card rounded-xl overflow-hidden">
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full elegant-table">
                                <thead>
                                    <tr>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Title</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Image</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Status</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Order</th>
                                        <th class="px-8 py-5 text-left text-sm font-medium">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bespokeSections as $bespoke)
                                    <tr>
                                        <td class="px-8 py-5">
                                            <div class="font-medium">{{ $bespoke->title }}</div>
                                            <div class="text-sm text-muted">{{ Str::limit($bespoke->subtitle, 30) }}</div>
                                        </td>
                                        <td class="px-8 py-5">
                                            @if($bespoke->image)
                                                <div class="w-20 h-20 rounded-lg overflow-hidden border border-subtle">
                                                    <img src="{{ asset('storage/' . $bespoke->image) }}" 
                                                         alt="{{ $bespoke->title }}"
                                                         class="w-full h-full object-cover">
                                                </div>
                                            @else
                                                <div class="w-20 h-20 rounded-lg border border-subtle flex items-center justify-center">
                                                    <i class="fas fa-image text-muted"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-8 py-5">
                                            <span class="status-badge {{ $bespoke->is_active ? 'status-active' : 'status-inactive' }}">
                                                <i class="fas fa-circle text-xs"></i>
                                                {{ $bespoke->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-5">
                                            <div class="font-medium">{{ $bespoke->order }}</div>
                                        </td>
                                        <td class="px-8 py-5">
                                            <div class="flex items-center gap-2">
                                                <button onclick="editBespoke({{ json_encode($bespoke) }})"
                                                        class="btn-action edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <form action="{{ route('admin.bespoke-sections.destroy', $bespoke->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Delete this bespoke section?')"
                                                            class="btn-action delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="p-8 border-t border-subtle">
                <div class="text-center">
                    <p class="text-muted text-sm">
                        Angel Cake Premium Bakery • Admin Dashboard v1.0
                    </p>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        let sidebarOpen = true;
        
        function toggleSection(section) {
            if (section === 'products') {
                document.getElementById('products-section').classList.remove('hidden');
                document.getElementById('reviews-section').classList.add('hidden');
                document.getElementById('bespoke-section').classList.add('hidden');
            } else if (section === 'reviews') {
                document.getElementById('products-section').classList.add('hidden');
                document.getElementById('reviews-section').classList.remove('hidden');
                document.getElementById('bespoke-section').classList.add('hidden');
            } else if (section === 'bespoke') {
                document.getElementById('products-section').classList.add('hidden');
                document.getElementById('reviews-section').classList.add('hidden');
                document.getElementById('bespoke-section').classList.remove('hidden');
            }
        }
        
        // Product Form Handling
        function showProductForm(product = null) {
            const formContainer = document.getElementById('product-form-container');
            const formTitle = document.getElementById('product-form-title');
            const form = document.getElementById('product-form');
            const formMethod = document.getElementById('product_form_method');
            const imagePreview = document.getElementById('product_image_preview');
            
            if (product) {
                formTitle.textContent = 'Edit Product';
                document.getElementById('product_id').value = product.id;
                document.getElementById('product_name').value = product.name;
                document.getElementById('product_price').value = product.price;
                document.getElementById('product_description').value = product.description;
                
                if (product.image) {
                    imagePreview.innerHTML = `
                        <div class="relative w-40 h-40 rounded-lg overflow-hidden border border-subtle">
                            <img src="{{ asset('storage') }}/${product.image}" 
                                 alt="Preview" 
                                 class="w-full h-full object-cover">
                        </div>
                    `;
                }
                
                form.action = `/admin/products/${product.id}`;
                formMethod.value = 'PUT';
            } else {
                formTitle.textContent = 'Add New Product';
                document.getElementById('product_id').value = '';
                document.getElementById('product_name').value = '';
                document.getElementById('product_price').value = '';
                document.getElementById('product_description').value = '';
                document.getElementById('product_image').value = '';
                imagePreview.innerHTML = '';
                
                form.action = '{{ route("admin.products.store") }}';
                formMethod.value = 'POST';
            }
            
            formContainer.classList.remove('hidden');
            formContainer.scrollIntoView({ behavior: 'smooth' });
        }
        
        function hideProductForm() {
            document.getElementById('product-form-container').classList.add('hidden');
        }
        
        function editProduct(product) {
            showProductForm(product);
        }
        
        // Review Form Handling
        function showReviewForm(review = null) {
            const formContainer = document.getElementById('review-form-container');
            const formTitle = document.getElementById('review-form-title');
            const form = document.getElementById('review-form');
            const formMethod = document.getElementById('review_form_method');
            
            if (review) {
                formTitle.textContent = 'Edit Review';
                document.getElementById('review_id').value = review.id;
                document.getElementById('review_customer_name').value = review.customer_name;
                document.getElementById('review_rating').value = review.rating;
                document.getElementById('review_text').value = review.review;
                
                form.action = `/admin/reviews/${review.id}`;
                formMethod.value = 'PUT';
            } else {
                formTitle.textContent = 'Add New Review';
                document.getElementById('review_id').value = '';
                document.getElementById('review_customer_name').value = '';
                document.getElementById('review_rating').value = '5';
                document.getElementById('review_text').value = '';
                
                form.action = '{{ route("admin.reviews.store") }}';
                formMethod.value = 'POST';
            }
            
            formContainer.classList.remove('hidden');
            formContainer.scrollIntoView({ behavior: 'smooth' });
        }
        
        function hideReviewForm() {
            document.getElementById('review-form-container').classList.add('hidden');
        }
        
        function editReview(review) {
            showReviewForm(review);
        }

        // Bespoke Form Handling
        function showBespokeForm(bespoke = null) {
            const formContainer = document.getElementById('bespoke-form-container');
            const formTitle = document.getElementById('bespoke-form-title');
            const form = document.getElementById('bespoke-form');
            const formMethod = document.getElementById('bespoke_form_method');
            const imagePreview = document.getElementById('bespoke_image_preview');

            if (bespoke) {
                formTitle.textContent = 'Edit Bespoke';
                document.getElementById('bespoke_id').value = bespoke.id;
                document.getElementById('bespoke_title').value = bespoke.title;
                document.getElementById('bespoke_subtitle').value = bespoke.subtitle || '';
                document.getElementById('bespoke_description').value = bespoke.description;
                document.getElementById('bespoke_image_label').value = bespoke.image_label;
                document.getElementById('bespoke_order').value = bespoke.order;
                document.getElementById('bespoke_is_active').checked = bespoke.is_active;

                // Features
                const features = bespoke.features || [];
                if (features[0]) {
                    document.getElementById('bespoke_feature1_value').value = features[0].value;
                    document.getElementById('bespoke_feature1_label').value = features[0].label;
                }
                if (features[1]) {
                    document.getElementById('bespoke_feature2_value').value = features[1].value;
                    document.getElementById('bespoke_feature2_label').value = features[1].label;
                }
                if (features[2]) {
                    document.getElementById('bespoke_feature3_value').value = features[2].value;
                    document.getElementById('bespoke_feature3_label').value = features[2].label;
                }

                if (bespoke.image) {
                    imagePreview.innerHTML = `
                        <div class="relative w-40 h-40 rounded-lg overflow-hidden border border-subtle">
                            <img src="{{ asset('storage') }}/${bespoke.image}" 
                                 alt="Preview" 
                                 class="w-full h-full object-cover">
                        </div>
                    `;
                }

                form.action = `/admin/bespoke-sections/${bespoke.id}`;
                formMethod.value = 'PUT';
            } else {
                formTitle.textContent = 'Add New Bespoke';
                document.getElementById('bespoke_id').value = '';
                document.getElementById('bespoke_title').value = '';
                document.getElementById('bespoke_subtitle').value = '';
                document.getElementById('bespoke_description').value = '';
                document.getElementById('bespoke_image').value = '';
                document.getElementById('bespoke_image_label').value = 'THE GOLDEN TIER';
                document.getElementById('bespoke_order').value = 0;
                document.getElementById('bespoke_is_active').checked = true;
                // Reset features
                document.getElementById('bespoke_feature1_value').value = '';
                document.getElementById('bespoke_feature1_label').value = '';
                document.getElementById('bespoke_feature2_value').value = '';
                document.getElementById('bespoke_feature2_label').value = '';
                document.getElementById('bespoke_feature3_value').value = '';
                document.getElementById('bespoke_feature3_label').value = '';
                imagePreview.innerHTML = '';

                form.action = '{{ route("admin.bespoke-sections.store") }}';
                formMethod.value = 'POST';
            }

            formContainer.classList.remove('hidden');
            formContainer.scrollIntoView({ behavior: 'smooth' });
        }

        function hideBespokeForm() {
            document.getElementById('bespoke-form-container').classList.add('hidden');
        }

        function editBespoke(bespoke) {
            showBespokeForm(bespoke);
        }
        
        // Drag and drop for featured products
        document.addEventListener('DOMContentLoaded', function() {
            const featuredProducts = document.getElementById('featured-products');
            
            if (featuredProducts) {
                new Sortable(featuredProducts, {
                    animation: 150,
                    handle: '.cursor-move',
                    onEnd: function() {
                        const order = Array.from(featuredProducts.children).map(child => child.dataset.id);
                        
                        fetch('{{ route("admin.products.update-order") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ order })
                        });
                    }
                });
            }
            
            // Image preview for product form
            const imageInput = document.getElementById('product_image');
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const preview = document.getElementById('product_image_preview');
                    preview.innerHTML = '';
                    
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-40 h-40 object-cover rounded-lg border border-subtle';
                            preview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Image preview for bespoke form
            const bespokeImageInput = document.getElementById('bespoke_image');
            if (bespokeImageInput) {
                bespokeImageInput.addEventListener('change', function(e) {
                    const preview = document.getElementById('bespoke_image_preview');
                    preview.innerHTML = '';

                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'w-40 h-40 object-cover rounded-lg border border-subtle';
                            preview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
        
        // Handle product form submission
        document.getElementById('product-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            
            try {
                const response = await fetch(form.action, {
                    method: form.querySelector('input[name="_method"]').value === 'PUT' ? 'POST' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });
                
                if (response.ok) {
                    window.location.reload();
                } else {
                    const error = await response.json();
                    alert(error.message || 'An error occurred');
                }
            } catch (error) {
                alert('Error: ' + error.message);
            }
        });
        
        // Handle review form submission
        document.getElementById('review-form').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            
            try {
                const response = await fetch(form.action, {
                    method: form.querySelector('input[name="_method"]').value === 'PUT' ? 'POST' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });
                
                if (response.ok) {
                    window.location.reload();
                } else {
                    const error = await response.json();
                    alert(error.message || 'An error occurred');
                }
            } catch (error) {
                alert('Error: ' + error.message);
            }
        });

        // Handle bespoke form submission
        document.getElementById('bespoke-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: form.querySelector('input[name="_method"]').value === 'PUT' ? 'POST' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                });

                if (response.ok) {
                    window.location.reload();
                } else {
                    const error = await response.json();
                    alert(error.message || 'An error occurred');
                }
            } catch (error) {
                alert('Error: ' + error.message);
            }
        });
    </script>
</body>
</html>