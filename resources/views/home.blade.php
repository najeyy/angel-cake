@extends('layouts.app')

@section('styles')
<style>
    :root {
        --color-gold: #E8B86D;
        --color-dark-gold: #C9994A;
        --color-cream: #FFF8E7;
        --color-bg-dark: #0F0F0F;
        --color-bg-medium: #1A1A1A;
        --color-bg-light: #252525;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .elegant-font {
        font-family: 'Playfair Display', serif;
    }
    
    .modern-font {
        font-family: 'Montserrat', sans-serif;
    }
    
    .card-elegant {
        background: linear-gradient(145deg, #1A1A1A 0%, #0F0F0F 100%);
        border: 1px solid rgba(232, 184, 109, 0.12);
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }
    
    .card-elegant:hover {
        border-color: rgba(232, 184, 109, 0.35);
        transform: translateY(-12px);
        box-shadow: 0 25px 50px rgba(232, 184, 109, 0.15);
    }
    
    .card-elegant::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
        opacity: 0;
        transition: opacity 0.5s;
    }
    
    .card-elegant:hover::before {
        opacity: 1;
    }
    
    .card-elegant::after {
        content: '';
        position: absolute;
        inset: -1px;
        background: linear-gradient(145deg, rgba(232, 184, 109, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.5s;
        pointer-events: none;
        z-index: -1;
    }
    
    .card-elegant:hover::after {
        opacity: 1;
    }
    
    .glass-effect {
        background: rgba(15, 15, 15, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(232, 184, 109, 0.15);
    }
    
    .ornament-line {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
    }
    
    /* Premium Elegant Button */
    .btn-premium {
        position: relative;
        background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
        color: #0F0F0F;
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-premium::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
        transition: left 0.6s ease;
    }
    
    .btn-premium:hover::before {
        left: 100%;
    }
    
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 30px rgba(232, 184, 109, 0.4);
    }
    
    .btn-premium:active {
        transform: translateY(0);
    }
    
    /* Outline Elegant Button */
    .btn-outline-elegant {
        position: relative;
        background: transparent;
        border: 1px solid var(--color-gold);
        color: var(--color-gold);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-outline-elegant::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        background: rgba(232, 184, 109, 0.1);
        transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
    }
    
    .btn-outline-elegant:hover::before {
        width: 100%;
    }
    
    .btn-outline-elegant:hover {
        border-color: rgba(232, 184, 109, 0.8);
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(232, 184, 109, 0.15);
    }
    
    /* Floating Action Button */
    .btn-floating-elegant {
        position: relative;
        background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
        color: #0F0F0F;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        overflow: hidden;
    }
    
    .btn-floating-elegant::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.3);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }
    
    .btn-floating-elegant:focus:not(:active)::after {
        animation: ripple 1s ease-out;
    }
    
    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        20% {
            transform: scale(25, 25);
            opacity: 0.3;
        }
        100% {
            opacity: 0;
            transform: scale(40, 40);
        }
    }
    
    .btn-floating-elegant:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 12px 40px rgba(232, 184, 109, 0.4);
    }
    
    /* Product Action Button */
    .btn-product-action {
        background: transparent;
        border: 1px solid var(--color-gold);
        color: var(--color-gold);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .btn-product-action:hover {
        background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
        color: #0F0F0F;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(232, 184, 109, 0.3);
    }
    
    /* Service Card Button Effect */
    .service-card-hover {
        position: relative;
        overflow: hidden;
    }
    
    .service-card-hover::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(232, 184, 109, 0.1);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }
    
    .service-card-hover:hover::after {
        animation: circle 1s ease-out;
    }
    
    @keyframes circle {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        100% {
            transform: scale(20, 20);
            opacity: 0;
        }
    }
    
    .text-shadow-gold {
        text-shadow: 0 0 30px rgba(232, 184, 109, 0.4);
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    
    .delay-300 {
        animation-delay: 300ms;
        animation-fill-mode: both;
    }
    
    .delay-600 {
        animation-delay: 600ms;
        animation-fill-mode: both;
    }
</style>
@endsection

@section('content')
    <!-- Hero Section with Classic Elegance -->
    <section id="home" class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-neutral-950 via-neutral-900 to-neutral-950">
        <!-- Decorative Background -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-20 right-20 w-[500px] h-[500px] rounded-full opacity-30" style="background: radial-gradient(circle, rgba(232, 184, 109, 0.15) 0%, transparent 70%);"></div>
            <div class="absolute bottom-20 left-20 w-[500px] h-[500px] rounded-full opacity-30" style="background: radial-gradient(circle, rgba(232, 184, 109, 0.15) 0%, transparent 70%);"></div>
            
            <!-- Elegant Grid Pattern -->
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(232, 184, 109, 0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(232, 184, 109, 0.5) 1px, transparent 1px); background-size: 60px 60px;"></div>
        </div>
        
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 relative z-10 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center max-w-7xl mx-auto">
                <!-- Left Column - Content -->
                <div class="animate-fade-in-up">
                    <!-- Ornamental Top -->
                    <div class="flex items-center justify-center lg:justify-start mb-10">
                        <div class="h-px w-16 bg-gradient-to-r from-transparent via-amber-600 to-amber-600"></div>
                        <div class="mx-5 px-8 py-2.5 border border-amber-600/20 rounded-full backdrop-blur-sm">
                            <span class="text-amber-600 text-sm elegant-font tracking-[0.2em] font-light">PREMIUM ARTISAN BAKERY</span>
                        </div>
                        <div class="h-px w-16 bg-gradient-to-l from-amber-600 via-amber-600 to-transparent"></div>
                    </div>
                    
                    <!-- Main Heading -->
                    <h1 class="text-6xl lg:text-7xl xl:text-8xl font-bold mb-8 leading-[1.1] elegant-font">
                        <span class="block text-neutral-50 text-shadow-gold">Angel Cake</span>
                        <span class="block text-amber-600 mt-4 text-4xl lg:text-5xl font-light tracking-wide">
                            Where Every Slice Tells a Story
                        </span>
                    </h1>
                    
                    <!-- Description -->
                    <div class="space-y-6 mb-12 max-w-xl">
                        <p class="text-xl text-neutral-300 leading-relaxed modern-font font-light">
                            Handcrafted with passion and precision. Premium artisan cakes made from the finest ingredients.
                        </p>
                        <div class="flex items-start space-x-4 pt-4 border-t border-amber-600/15">
                            <i class="fas fa-map-marker-alt text-amber-600 mt-1"></i>
                            <div>
                                <p class="text-lg text-neutral-300 modern-font font-light leading-relaxed">
                                    Sianok Anam Suku, IV Koto<br>
                                    Agam Regency, West Sumatra 26161<br>
                                    Indonesia
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-5 mb-16">
                        <a href="#products" 
                           class="btn-premium inline-flex items-center justify-center px-10 py-5 font-semibold modern-font tracking-[0.15em] text-sm group relative overflow-hidden rounded-xl">
                            <span class="relative z-10 flex items-center">
                                <span>EXPLORE COLLECTION</span>
                                <i class="fas fa-arrow-right ml-3 transition-transform duration-300 group-hover:translate-x-2"></i>
                            </span>
                        </a>
                        
                        <a href="https://wa.me/6285278803635" 
                           target="_blank"
                           class="btn-outline-elegant inline-flex items-center justify-center px-10 py-5 font-semibold modern-font tracking-[0.15em] text-sm rounded-xl">
                            <i class="fab fa-whatsapp mr-3 text-base"></i>
                            BOOK NOW
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-10 pt-10 border-t border-amber-600/15">
                        <div class="text-center">
                            <div class="text-5xl font-bold text-amber-600 mb-3 elegant-font">5+</div>
                            <div class="text-xs text-neutral-400 uppercase tracking-[0.2em] modern-font font-light">Years Excellence</div>
                        </div>
                        <div class="text-center border-x border-amber-600/15">
                            <div class="text-5xl font-bold text-amber-600 mb-3 elegant-font">2K+</div>
                            <div class="text-xs text-neutral-400 uppercase tracking-[0.2em] modern-font font-light">Happy Clients</div>
                        </div>
                        <div class="text-center">
                            <div class="text-5xl font-bold text-amber-600 mb-3 elegant-font">500+</div>
                            <div class="text-xs text-neutral-400 uppercase tracking-[0.2em] modern-font font-light">Events Served</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Featured Product Card -->
                <div class="animate-fade-in-up delay-300">
                    <div class="relative max-w-xl mx-auto">
                        <!-- Decorative Outer Frame -->
                        <div class="absolute -inset-6 border border-amber-600/10 rounded-2xl"></div>
                        
                        <!-- Main Card -->
                        <div class="relative card-elegant overflow-hidden shadow-2xl rounded-2xl">
                            <!-- Image with Overlay -->
                            <div class="relative h-[480px] overflow-hidden group">
                                <img src="images/kue.jpeg" 
                                     alt="Almond Chocolate Cookies"
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                
                                <!-- Elegant Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-neutral-950/60 to-transparent"></div>
                                
                                <!-- Badge -->
                                <div class="absolute top-8 right-8">
                                    <div class="glass-effect px-5 py-2.5 backdrop-blur-md rounded-lg">
                                        <span class="text-amber-600 text-xs font-semibold tracking-[0.2em] modern-font flex items-center">
                                            <i class="fas fa-crown mr-2"></i> SIGNATURE
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Bottom Info Overlay -->
                                <div class="absolute bottom-0 left-0 right-0 p-10">
                                    <div class="ornament-line mb-6"></div>
                                    <h3 class="text-4xl font-bold text-neutral-50 mb-3 elegant-font">Almond Chocolate Cookies</h3>
                                    <p class="text-neutral-300 text-base modern-font font-light mb-6 leading-relaxed">
                                        A Perfect Blend of Rich Chocolate and Crunchy Almonds.
                                    </p>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-star text-amber-500 text-sm"></i>
                                            <i class="fas fa-star text-amber-500 text-sm"></i>
                                            <i class="fas fa-star text-amber-500 text-sm"></i>
                                            <i class="fas fa-star text-amber-500 text-sm"></i>
                                            <i class="fas fa-star text-amber-500 text-sm"></i>
                                            <span class="text-sm text-neutral-400 ml-3 modern-font">(4.9)</span>
                                        </div>
                                        <div class="text-amber-500 font-bold text-3xl elegant-font">
                                            150K
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Decorative Corner Elements -->
                        <div class="absolute -top-3 -left-3 w-16 h-16 border-t-2 border-l-2 border-amber-600/30"></div>
                        <div class="absolute -bottom-3 -right-3 w-16 h-16 border-b-2 border-r-2 border-amber-600/30"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 text-center">
            <div class="text-amber-600/40 text-xs uppercase tracking-[0.3em] mb-4 modern-font font-light">Scroll Down</div>
            <a href="#products" class="text-amber-600 hover:text-amber-500 transition-colors duration-300">
                <i class="fas fa-chevron-down text-2xl animate-bounce"></i>
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section id="products" class="py-28 bg-neutral-950">
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 max-w-7xl">
            <!-- Section Header with Ornaments -->
            <div class="text-center mb-24">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                    <div class="mx-8">
                        <i class="fas fa-crown text-amber-600 text-3xl"></i>
                    </div>
                    <div class="h-px w-20 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                </div>
                <h2 class="text-6xl font-bold text-neutral-50 mb-6 elegant-font text-shadow-gold">
                    Our Signature Collection
                </h2>
                <p class="text-neutral-400 max-w-2xl mx-auto text-lg modern-font font-light leading-relaxed">
                    Meticulously crafted masterpieces, each a testament to our commitment to excellence
                </p>
            </div>
            
            <!-- Featured Products Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 mb-28">
                @foreach($featuredProducts->take(3) as $product)
                <div class="card-elegant overflow-hidden group relative rounded-2xl service-card-hover">
                    <!-- Corner Decorations -->
                    <div class="absolute top-0 left-0 w-10 h-10 border-t-2 border-l-2 border-amber-600/20 z-10 transition-colors duration-500 group-hover:border-amber-600/40"></div>
                    <div class="absolute top-0 right-0 w-10 h-10 border-t-2 border-r-2 border-amber-600/20 z-10 transition-colors duration-500 group-hover:border-amber-600/40"></div>
                    
                    <!-- Product Image -->
                    <div class="relative h-[400px] overflow-hidden">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-transparent opacity-70"></div>
                        
                        <!-- Badge -->
                        <div class="absolute top-8 left-8">
                            <div class="glass-effect px-4 py-2 backdrop-blur-md rounded-lg">
                                <span class="text-amber-600 text-xs font-semibold tracking-[0.2em] modern-font">FEATURED</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-10">
                        <div class="ornament-line mb-6"></div>
                        
                        <h3 class="text-2xl font-bold text-neutral-50 mb-4 elegant-font group-hover:text-amber-600 transition-colors duration-300">
                            {{ $product->name }}
                        </h3>
                        <p class="text-neutral-400 text-sm mb-8 modern-font font-light leading-relaxed">
                            {{ Str::limit($product->description, 100) }}
                        </p>
                        
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-amber-500 text-sm"></i>
                                @endfor
                                <span class="text-sm text-neutral-500 ml-3 modern-font">(4.9)</span>
                            </div>
                            <div class="text-amber-500 font-bold text-3xl elegant-font">
                                {{ number_format($product->price / 1000, 0) }}K
                            </div>
                        </div>
                        
                        <!-- Action Button -->
                        <a href="https://wa.me/6285278803635?text=Halo%20Angel%20Cake,%20saya%20ingin%20memesan%20{{ urlencode($product->name) }}"
                           target="_blank"
                           class="block w-full py-4 btn-product-action text-center font-semibold modern-font tracking-[0.15em] text-sm rounded-xl">
                            ORDER NOW
                        </a>
                    </div>
                    
                    <!-- Bottom Corner Decorations -->
                    <div class="absolute bottom-0 left-0 w-10 h-10 border-b-2 border-l-2 border-amber-600/20 transition-colors duration-500 group-hover:border-amber-600/40"></div>
                    <div class="absolute bottom-0 right-0 w-10 h-10 border-b-2 border-r-2 border-amber-600/20 transition-colors duration-500 group-hover:border-amber-600/40"></div>
                </div>
                @endforeach
            </div>
            
            <!-- All Products -->
            <div>
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h3 class="text-4xl font-bold text-neutral-50 elegant-font mb-3">Complete Collection</h3>
                        <div class="h-0.5 w-32 bg-amber-600"></div>
                    </div>
                    <a href="#" class="btn-outline-elegant inline-flex items-center px-6 py-3 font-medium modern-font tracking-[0.15em] text-sm rounded-lg">
                        VIEW ALL
                        <i class="fas fa-arrow-right ml-3 transition-transform duration-300 group-hover:translate-x-1"></i>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($allProducts as $product)
                    <div class="card-elegant overflow-hidden group relative rounded-xl">
                        <!-- Simple Corner Accent -->
                        <div class="absolute top-0 right-0 w-8 h-8 border-t border-r border-amber-600/20 z-10 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                        
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-neutral-950 via-transparent to-transparent opacity-40"></div>
                            
                            <div class="absolute inset-0 bg-neutral-950/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <a href="https://wa.me/6285278803635?text=Halo%20Angel%20Cake,%20saya%20tertarik%20dengan%20{{ urlencode($product->name) }}"
                                   target="_blank"
                                   class="px-8 py-3 btn-premium text-sm font-semibold modern-font tracking-[0.15em] rounded-lg">
                                    ORDER NOW
                                </a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h4 class="font-bold text-neutral-50 text-base mb-2 truncate elegant-font">{{ $product->name }}</h4>
                            <p class="text-neutral-400 text-xs mb-4 line-clamp-2 modern-font font-light">{{ Str::limit($product->description, 60) }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-amber-500 font-bold elegant-font text-xl">{{ number_format($product->price / 1000, 0) }}K</span>
                                <div class="flex items-center space-x-1">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-amber-500 text-xs"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        
                        <div class="absolute bottom-0 left-0 w-8 h-8 border-b border-l border-amber-600/20 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-28 bg-gradient-to-b from-neutral-900 to-neutral-950">
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 max-w-7xl">
            <div class="text-center mb-24">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                    <div class="mx-8">
                        <i class="fas fa-award text-amber-600 text-3xl"></i>
                    </div>
                    <div class="h-px w-20 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                </div>
                <h2 class="text-6xl font-bold text-neutral-50 mb-6 elegant-font text-shadow-gold">
                    Our Heritage
                </h2>
                <p class="text-neutral-400 max-w-2xl mx-auto text-lg modern-font font-light leading-relaxed">
                    A legacy of excellence in artisan baking since 2018
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <!-- Image Column -->
                <div class="relative">
                    <div class="absolute -inset-6 border border-amber-600/15 rounded-2xl"></div>
                    <div class="relative overflow-hidden rounded-xl">
                        <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                             alt="Baking Process"
                             class="w-full h-auto">
                    </div>
                    <div class="absolute top-0 left-0 w-20 h-20 border-t-2 border-l-2 border-amber-600/30"></div>
                    <div class="absolute bottom-0 right-0 w-20 h-20 border-b-2 border-r-2 border-amber-600/30"></div>
                </div>
                
                <!-- Content Column -->
                <div class="space-y-10">
                    <div>
                        <h3 class="text-4xl font-bold text-neutral-50 mb-5 elegant-font">Premium Quality Since 2018</h3>
                        <div class="h-0.5 w-28 bg-amber-600 mb-8"></div>
                        <p class="text-neutral-300 leading-relaxed modern-font text-lg font-light">
                            Angel Cake was born from a passion for the art of fine baking. Every creation is crafted with 
                            premium ingredients, time-honored techniques, and a touch of modern innovation.
                        </p>
                    </div>
                    
                    <div class="space-y-8">
                        <div class="flex items-start space-x-6 group">
                            <div class="w-20 h-20 border-2 border-amber-600/20 flex items-center justify-center flex-shrink-0 group-hover:border-amber-600/50 transition-colors duration-300 rounded-xl">
                                <i class="fas fa-leaf text-amber-600 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-neutral-50 mb-3 elegant-font text-xl">Organic Ingredients</h4>
                                <p class="text-neutral-400 text-sm modern-font font-light leading-relaxed">
                                    Only the finest organic and premium ingredients for exceptional taste and quality.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-6 group">
                            <div class="w-20 h-20 border-2 border-amber-600/20 flex items-center justify-center flex-shrink-0 group-hover:border-amber-600/50 transition-colors duration-300 rounded-xl">
                                <i class="fas fa-hand-sparkles text-amber-600 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-neutral-50 mb-3 elegant-font text-xl">Handcrafted</h4>
                                <p class="text-neutral-400 text-sm modern-font font-light leading-relaxed">
                                    Each cake is meticulously handcrafted by our experienced pastry artisans.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-6 group">
                            <div class="w-20 h-20 border-2 border-amber-600/20 flex items-center justify-center flex-shrink-0 group-hover:border-amber-600/50 transition-colors duration-300 rounded-xl">
                                <i class="fas fa-truck text-amber-600 text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-neutral-50 mb-3 elegant-font text-xl">Premium Delivery</h4>
                                <p class="text-neutral-400 text-sm modern-font font-light leading-relaxed">
                                    Specialized packaging ensures your cake arrives in perfect condition.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-28 bg-neutral-950">
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 max-w-7xl">
            <div class="text-center mb-24">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                    <div class="mx-8">
                        <i class="fas fa-concierge-bell text-amber-600 text-3xl"></i>
                    </div>
                    <div class="h-px w-20 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                </div>
                <h2 class="text-6xl font-bold text-neutral-50 mb-6 elegant-font text-shadow-gold">
                    Our Services
                </h2>
                <p class="text-neutral-400 max-w-2xl mx-auto text-lg modern-font font-light leading-relaxed">
                    Comprehensive luxury services for your special moments
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                @php
                    $services = [
                        ['icon' => 'fa-palette', 'title' => 'Custom Design', 'desc' => 'Bespoke cake designs tailored to your vision and celebration theme.'],
                        ['icon' => 'fa-truck', 'title' => 'Premium Delivery', 'desc' => 'White-glove delivery service ensuring perfect condition arrival.'],
                        ['icon' => 'fa-calendar-alt', 'title' => 'Event Catering', 'desc' => 'Full-service catering for weddings and corporate celebrations.'],
                        ['icon' => 'fa-star','title' => 'Signature Collection','desc' => 'Our best-selling cakes and cookies, crafted with signature recipes and premium ingredients.']

                    ];
                @endphp
                
                @foreach($services as $service)
                <div class="card-elegant p-10 text-center group relative service-card-hover rounded-2xl">
                    <div class="absolute top-0 left-0 w-10 h-10 border-t border-l border-amber-600/20 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                    <div class="absolute top-0 right-0 w-10 h-10 border-t border-r border-amber-600/20 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                    
                    <div class="w-24 h-24 border-2 border-amber-600/20 mx-auto flex items-center justify-center mb-8 group-hover:border-amber-600/50 transition-colors duration-300 rounded-2xl">
                        <i class="fas {{ $service['icon'] }} text-amber-600 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-neutral-50 mb-4 elegant-font">{{ $service['title'] }}</h3>
                    <div class="ornament-line mb-6 mx-auto w-20"></div>
                    <p class="text-neutral-400 mb-6 text-sm modern-font font-light leading-relaxed">
                        {{ $service['desc'] }}
                    </p>
                    
                    <div class="absolute bottom-0 left-0 w-10 h-10 border-b border-l border-amber-600/20 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                    <div class="absolute bottom-0 right-0 w-10 h-10 border-b border-r border-amber-600/20 transition-colors duration-300 group-hover:border-amber-600/40"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="reviews" class="py-28 bg-gradient-to-b from-neutral-900 to-neutral-950">
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 max-w-7xl">
            <div class="text-center mb-24">
                <div class="flex items-center justify-center mb-8">
                    <div class="h-px w-20 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                    <div class="mx-8">
                        <i class="fas fa-quote-left text-amber-600 text-3xl"></i>
                    </div>
                    <div class="h-px w-20 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                </div>
                <h2 class="text-6xl font-bold text-neutral-50 mb-6 elegant-font text-shadow-gold">
                    Client Testimonials
                </h2>
                <p class="text-neutral-400 max-w-2xl mx-auto text-lg modern-font font-light leading-relaxed">
                    Hear from those who have experienced our exceptional service
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($reviews as $review)
                <div class="card-elegant p-10 relative rounded-2xl">
                    <div class="absolute top-0 left-0 w-12 h-12 border-t border-l border-amber-600/20"></div>
                    <div class="absolute top-0 right-0 w-12 h-12 border-t border-r border-amber-600/20"></div>
                    
                    <!-- Quote Icon -->
                    <div class="text-amber-600/15 mb-8">
                        <i class="fas fa-quote-left text-5xl"></i>
                    </div>
                    
                    <!-- Review Text -->
                    <p class="text-neutral-300 italic mb-10 leading-relaxed modern-font font-light text-base">
                        "{{ $review->review }}"
                    </p>
                    
                    <div class="ornament-line mb-8"></div>
                    
                    <!-- Customer Info -->
                    <div class="flex items-center">
                        <div class="w-16 h-16 border-2 border-amber-600/20 flex items-center justify-center text-amber-600 font-bold elegant-font text-2xl mr-5 rounded-xl">
                            {{ strtoupper(substr($review->customer_name, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="font-bold text-neutral-50 elegant-font text-lg mb-2">{{ $review->customer_name }}</h4>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star text-amber-500 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-amber-500 text-sm"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute bottom-0 left-0 w-12 h-12 border-b border-l border-amber-600/20"></div>
                    <div class="absolute bottom-0 right-0 w-12 h-12 border-b border-r border-amber-600/20"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-28 relative overflow-hidden bg-gradient-to-br from-neutral-950 via-neutral-900 to-neutral-950">
        <!-- Elegant Background Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(rgba(232, 184, 109, 0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(232, 184, 109, 0.5) 1px, transparent 1px); background-size: 50px 50px;"></div>
        
        <div class="container mx-auto px-6 md:px-8 lg:px-12 xl:px-16 relative z-10 max-w-5xl">
            <div class="text-center">
                <div class="flex items-center justify-center mb-10">
                    <div class="h-px w-24 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                    <div class="mx-10">
                        <i class="fas fa-envelope text-amber-600 text-4xl"></i>
                    </div>
                    <div class="h-px w-24 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                </div>
                
                <h2 class="text-6xl lg:text-7xl font-bold text-neutral-50 mb-8 elegant-font text-shadow-gold">
                    Create Your Masterpiece
                </h2>
                <p class="text-neutral-300 text-xl mb-14 leading-relaxed modern-font font-light max-w-3xl mx-auto">
                    Let us craft the perfect centerpiece for your celebration. Contact our team for a personalized consultation.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center mb-20">
                    <a href="https://wa.me/6285278803635" 
                       target="_blank"
                       class="btn-premium inline-flex items-center justify-center px-12 py-5 font-semibold modern-font tracking-[0.15em] text-sm rounded-xl">
                        <i class="fab fa-whatsapp mr-3 text-xl"></i>
                        WHATSAPP CONSULTATION
                    </a>
                    
                    <a href="tel:+6285278803635"
                       class="btn-outline-elegant inline-flex items-center justify-center px-12 py-5 font-semibold modern-font tracking-[0.15em] text-sm rounded-xl">
                        <i class="fas fa-phone mr-3"></i>
                        CALL NOW
                    </a>
                </div>
                
                <!-- Enhanced Address Section -->
                <div class="mt-20 pt-12 border-t border-amber-600/20">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                        <!-- Address Card -->
                        <div class="glass-effect p-8 rounded-2xl backdrop-blur-sm">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 border-2 border-amber-600/20 flex items-center justify-center rounded-lg mr-4">
                                    <i class="fas fa-map-marker-alt text-amber-600 text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-neutral-50 elegant-font">Our Location</h3>
                            </div>
                            <div class="space-y-3 pl-4 border-l-2 border-amber-600/30">
                                <p class="text-lg text-neutral-300 modern-font font-light">
                                    Sianok Anam Suku
                                </p>
                                <p class="text-lg text-neutral-300 modern-font font-light">
                                    IV Koto, Agam Regency
                                </p>
                                <p class="text-lg text-neutral-300 modern-font font-light">
                                    West Sumatra 26161
                                </p>
                                <p class="text-lg text-neutral-300 modern-font font-light">
                                    Indonesia
                                </p>
                            </div>
                        </div>
                        
                        <!-- Contact Info Card -->
                        <div class="glass-effect p-8 rounded-2xl backdrop-blur-sm">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 border-2 border-amber-600/20 flex items-center justify-center rounded-lg mr-4">
                                    <i class="fas fa-clock text-amber-600 text-xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-neutral-50 elegant-font">Business Hours</h3>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center border-b border-amber-600/10 pb-3">
                                    <span class="text-neutral-400 modern-font font-light">Monday - Saturday</span>
                                    <span class="text-amber-600 modern-font font-semibold">8:00 AM - 8:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-neutral-400 modern-font font-light">Sunday</span>
                                    <span class="text-amber-600 modern-font font-semibold">9:00 AM - 6:00 PM</span>
                                </div>
                            </div>
                            
                            <!-- Quick Contact -->
                            <div class="mt-8 pt-6 border-t border-amber-600/10">
                                <div class="flex items-center space-x-4">
                                    <a href="https://wa.me/6285278803635" 
                                       target="_blank"
                                       class="w-10 h-10 border-2 border-amber-600/20 hover:border-amber-600/50 flex items-center justify-center rounded-lg transition-colors duration-300">
                                        <i class="fab fa-whatsapp text-amber-600"></i>
                                    </a>
                                    <a href="tel:+6285278803635"
                                       class="w-10 h-10 border-2 border-amber-600/20 hover:border-amber-600/50 flex items-center justify-center rounded-lg transition-colors duration-300">
                                        <i class="fas fa-phone text-amber-600"></i>
                                    </a>
                                    <span class="text-neutral-300 modern-font font-light ml-2">+62 852 7880 3635</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-10 right-10 z-50">
        <a href="https://wa.me/6285278803635" 
           target="_blank"
           class="btn-floating-elegant w-20 h-20 flex items-center justify-center text-3xl shadow-2xl rounded-full">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>
@endsection