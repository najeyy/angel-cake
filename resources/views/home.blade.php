@extends('layouts.app')

@section('styles')
<style>
    :root {
        --color-gold: #d4af37;
        --color-dark-gold: #aa8c2c;
        --color-light-gold: #f3e5ab;
        --color-bg-dark: #050505;
        --color-bg-medium: #0f0f0f;
        --color-bg-light: #1a1a1a;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .animate-shimmer {
        background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.1), transparent);
        background-size: 1000px 100%;
        animation: shimmer 3s linear infinite;
    }
    
    .font-display {
        font-family: 'Cinzel', serif;
    }
    
    .font-serif {
        font-family: 'Playfair Display', serif;
    }
    
    .font-sans {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .text-gold-gradient {
        background: linear-gradient(to right, #bf953f, #fcf6ba, #b38728, #fbf5b7, #aa771c);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .gold-gradient {
        background: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa8c2c 100%);
    }
    
    .dark-gradient {
        background: linear-gradient(to bottom, rgba(5,5,5,0) 0%, #050505 100%);
    }
    
    .luxury-border {
        border: 1px solid rgba(212, 175, 55, 0.2);
    }
    
    .luxury-glow {
        box-shadow: 0 0 40px -10px rgba(212, 175, 55, 0.1);
    }
    
    /* Hide scrollbar */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }
    
    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    
    /* Card hover effects */
    .card-hover {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        background: var(--color-bg-medium);
        border: 1px solid rgba(212, 175, 55, 0.1);
    }
    
    .card-hover:hover {
        transform: translateY(-10px);
        border-color: rgba(212, 175, 55, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
    }
    
    /* Marquee animation */
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    
    .animate-marquee {
        animation: marquee 30s linear infinite;
    }
    
    /* Glass effect */
    .glass-effect {
        background: rgba(15, 15, 15, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(212, 175, 55, 0.15);
    }
    
    /* Ornament lines */
    .ornament-line {
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
    }
    
    /* Button styles */
    .btn-premium {
        position: relative;
        background: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa8c2c 100%);
        color: #050505;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        overflow: hidden;
        z-index: 1;
    }
    
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
    }
    
    /* Outline button */
    .btn-outline-gold {
        position: relative;
        background: transparent;
        border: 1px solid var(--color-gold);
        color: var(--color-gold);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .btn-outline-gold:hover {
        background: rgba(212, 175, 55, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(212, 175, 55, 0.1);
    }
    
    /* Floating button */
    .btn-floating-gold {
        position: relative;
        background: linear-gradient(135deg, #d4af37 0%, #f3e5ab 50%, #aa8c2c 100%);
        color: #050505;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
    }
    
    .btn-floating-gold:hover {
        transform: translateY(-4px) scale(1.05);
        box-shadow: 0 15px 30px rgba(212, 175, 55, 0.3);
    }
    
    /* Fade in animation */
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
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative w-full h-screen min-h-[800px] flex items-center justify-center overflow-hidden">
        <!-- Background -->
        <div class="absolute inset-0 w-full h-full">
            <div class="absolute inset-0 bg-black/50 z-10 mix-blend-multiply"></div>
            <div class="absolute inset-0 dark-gradient z-10"></div>
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlS1XyFD-lrJhio8SI-0m4NBbb5Hfai89Ou_CP5e0VkW2p4UyD0J3Iy7yso8UxKaRO82YixyNHLxKQ_P9OGTi0CnekQdvUZTY3XkX7KUAYGcbYP9L_srsLMeZA8owUnK_yAxz9jY7F1TvxA_Vsdvj09NIIQUI44WZvrsVf9khH_gJ9zWaO1uUgHZwxmAI4NhpdLRV9jW__-kt06WqlGwK1swTMcuBMsrlA-w4XYnbCLE8pTtpY8yx8L9MalvjRw8Ji8Q5UhSbMwN5b" 
                 alt="Luxury Cake"
                 class="w-full h-full object-cover object-center scale-105">
        </div>
        
        <!-- Content -->
        <div class="relative z-20 container mx-auto px-6 text-center">
            <div class="flex flex-col items-center gap-8">
                <!-- Decorative lines -->
                <div class="flex items-center gap-6 animate-fade-in-up opacity-80">
                    <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-[#d4af37]"></div>
                    <span class="font-display text-[#f3e5ab] uppercase tracking-[0.4em] text-xs font-semibold">Premium Artisan Bakery</span>
                    <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-[#d4af37]"></div>
                </div>
                
                <!-- Main heading -->
                <h1 class="font-display text-6xl md:text-8xl lg:text-9xl text-white mix-blend-overlay opacity-90 tracking-tighter">
                    ANGEL CAKE
                </h1>
                
                <!-- Subheading -->
                <h2 class="font-serif italic text-5xl md:text-7xl lg:text-8xl text-gold-gradient -mt-6 md:-mt-10 lg:-mt-12 relative z-10 drop-shadow-2xl">
                    Delicacies
                </h2>
                
                <!-- Description -->
                <p class="font-serif text-lg md:text-xl text-white/70 max-w-xl leading-relaxed mt-6">
                    Where Every Slice Tells a Story. Handcrafted with passion and precision.
                </p>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-8 mt-12 max-w-lg mx-auto">
                    <div class="text-center">
                        <div class="text-4xl font-display text-[#d4af37] mb-2">5+</div>
                        <div class="text-xs uppercase tracking-[0.2em] text-white/50">Years Excellence</div>
                    </div>
                    <div class="text-center border-x border-white/10">
                        <div class="text-4xl font-display text-[#d4af37] mb-2">2K+</div>
                        <div class="text-xs uppercase tracking-[0.2em] text-white/50">Happy Clients</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-display text-[#d4af37] mb-2">500+</div>
                        <div class="text-xs uppercase tracking-[0.2em] text-white/50">Events Served</div>
                    </div>
                </div>
                
                <!-- Scroll indicator -->
                <div class="flex flex-col items-center mt-16 gap-4">
                    <div class="w-[1px] h-24 bg-gradient-to-b from-[#d4af37] to-transparent"></div>
                    <span class="text-xs font-display text-white/50 tracking-widest uppercase animate-bounce">Explore</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Marquee Banner -->
    <div class="w-full bg-[#0f0f0f] py-4 overflow-hidden whitespace-nowrap border-y border-white/5 relative z-20">
        <div class="inline-flex animate-marquee items-center gap-16 text-[#d4af37]/40 font-display font-bold text-xs tracking-[0.3em] uppercase">
            <span>• Craftsmanship</span>
            <span>• Elegance</span>
            <span>• Passion</span>
            <span>• Excellence</span>
            <span>• Craftsmanship</span>
            <span>• Elegance</span>
            <span>• Passion</span>
            <span>• Excellence</span>
            <span>• Craftsmanship</span>
            <span>• Elegance</span>
            <span>• Passion</span>
            <span>• Excellence</span>
        </div>
    </div>

    <!-- Featured Products Section -->
    <section id="products" class="py-32 px-6 bg-[#050505] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-[#0f0f0f] to-transparent opacity-30 pointer-events-none"></div>
        
        <div class="max-w-[1400px] mx-auto space-y-32">
            <!-- Section header -->
            <div class="text-center mb-24 relative">
                <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[10rem] md:text-[15rem] font-display text-white/[0.02] pointer-events-none select-none">ART</span>
                <h2 class="font-display text-4xl md:text-5xl text-white relative z-10">Our Signature Collection</h2>
                <div class="w-24 h-1 gold-gradient mx-auto mt-6 rounded-full opacity-50"></div>
                <p class="text-white/60 max-w-2xl mx-auto mt-8 font-serif text-lg">
                    Meticulously crafted masterpieces, each a testament to our commitment to excellence
                </p>
            </div>
            
            <!-- Featured Product 1 -->
            <div class="flex flex-col md:flex-row items-center gap-12 md:gap-24 group">
                <div class="w-full md:w-3/5 relative">
                    <div class="aspect-[4/3] overflow-hidden rounded-sm relative z-10 luxury-border">
                        @if($featuredProducts->isNotEmpty())
                        <img src="{{ $featuredProducts->first()->image ? asset('storage/' . $featuredProducts->first()->image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCWHr7oSwgMhk12JP6yshPhy8XkMA45DhR3DGJF6AqIJgc2x97exjZ_8WFpKZSBDy9Rmys63Bih7dlL8Ni5AcnqVZ-Fk_D8JmiItqPzH5YMAVLrjmXLKD6qpcmOOssXxB3SB8iZziCg9Jvw9JsPBeMkBlkRboY9K_sIFIrWjrEXxhZqUPFgh2Di7-fG-5YJq--1XUlS-6rfB-yTHAEb6GY8Psf8X659vWUSSIxzC5q1yP3dT9JGL7_IB8wTBzjXhh4vZel5ybkmuu8Z' }}" 
                             alt="{{ $featuredProducts->first()->name }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1.5s] ease-out">
                        @else
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWHr7oSwgMhk12JP6yshPhy8XkMA45DhR3DGJF6AqIJgc2x97exjZ_8WFpKZSBDy9Rmys63Bih7dlL8Ni5AcnqVZ-Fk_D8JmiItqPzH5YMAVLrjmXLKD6qpcmOOssXxB3SB8iZziCg9Jvw9JsPBeMkBlkRboY9K_sIFIrWjrEXxhZqUPFgh2Di7-fG-5YJq--1XUlS-6rfB-yTHAEb6GY8Psf8X659vWUSSIxzC5q1yP3dT9JGL7_IB8wTBzjXhh4vZel5ybkmuu8Z" 
                             alt="Featured Cake"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1.5s] ease-out">
                        @endif
                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors duration-500"></div>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-full h-full border border-[#d4af37]/20 -z-0 hidden md:block transition-transform duration-500 group-hover:translate-x-2 group-hover:translate-y-2"></div>
                </div>
                
                <div class="w-full md:w-2/5 md:-ml-12 z-20">
                    <div class="bg-[#0f0f0f]/90 backdrop-blur-md p-8 md:p-12 border border-white/5 shadow-2xl luxury-glow">
                        <span class="text-[#d4af37] font-display text-xs tracking-widest uppercase mb-4 block">Signature Series</span>
                        <h3 class="font-display text-4xl text-white mb-6">
                            @if($featuredProducts->isNotEmpty())
                                {{ $featuredProducts->first()->name }}
                            @else
                                Almond Chocolate Cookies
                            @endif
                        </h3>
                        <p class="font-serif text-white/60 leading-relaxed mb-8 text-lg">
                            @if($featuredProducts->isNotEmpty())
                                {{ Str::limit($featuredProducts->first()->description, 150) }}
                            @else
                                A Perfect Blend of Rich Chocolate and Crunchy Almonds.
                            @endif
                        </p>
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-[#d4af37] text-sm"></i>
                                @endfor
                                <span class="text-sm text-white/40 ml-3">(4.9)</span>
                            </div>
                            <div class="text-[#d4af37] font-display font-bold text-3xl">
                                @if($featuredProducts->isNotEmpty())
                                    {{ number_format($featuredProducts->first()->price / 1000, 0) }}K
                                @else
                                    150K
                                @endif
                            </div>
                        </div>
                        <a href="https://wa.me/6285278803635?text=Halo%20Angel%20Cake,%20saya%20ingin%20memesan%20{{ $featuredProducts->isNotEmpty() ? urlencode($featuredProducts->first()->name) : 'Almond%20Chocolate%20Cookies' }}"
                           target="_blank"
                           class="inline-flex items-center gap-3 text-white hover:text-[#d4af37] transition-colors font-display text-xs tracking-widest uppercase border-b border-transparent hover:border-[#d4af37] pb-1">
                            Order Now
                            <i class="fas fa-arrow-right text-xs transform transition-transform group-hover:translate-x-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Featured Product 2 -->
            <div class="flex flex-col md:flex-row-reverse items-center gap-12 md:gap-24 group">
                <div class="w-full md:w-1/2 relative">
                    <div class="aspect-[4/3] overflow-hidden rounded-sm relative z-10 border border-white/10 luxury-glow">
                        @if($featuredProducts->count() > 1)
                        <img src="{{ $featuredProducts[1]->image ? asset('storage/' . $featuredProducts[1]->image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuA2ZXWxiFHzqgBTjpMXk-CvtMN-eHWVWe-LGVpkC655b63mYk-bgyqg6O5WRUbFTe1piuutvlQYSd5y16Tw7-5vUKzvFcvNIPhn78mfctAwE-OM8ieABBuiJcTI7Suwm3aehOnjMDplcYgPkkR23ILYP7Sed61B-6FfOvNjDR5F733hqsXKDOMFbifuSuEUvJFdnd-ojb41jcK7boWFuXWvKj82QK27zi1UV9O-M2UxmiXfEv8IawS0asvp_wRlAhiJ8sWg3o1L-9I5' }}" 
                             alt="{{ $featuredProducts[1]->name }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1.5s] ease-out">
                        @else
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2ZXWxiFHzqgBTjpMXk-CvtMN-eHWVWe-LGVpkC655b63mYk-bgyqg6O5WRUbFTe1piuutvlQYSd5y16Tw7-5vUKzvFcvNIPhn78mfctAwE-OM8ieABBuiJcTI7Suwm3aehOnjMDplcYgPkkR23ILYP7Sed61B-6FfOvNjDR5F733hqsXKDOMFbifuSuEUvJFdnd-ojb41jcK7boWFuXWvKj82QK27zi1UV9O-M2UxmiXfEv8IawS0asvp_wRlAhiJ8sWg3o1L-9I5" 
                             alt="Macarons"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[1.5s] ease-out">
                        @endif
                    </div>
                </div>
                
                <div class="w-full md:w-1/2 z-20 text-right md:text-right">
                    <div class="p-4 md:p-0">
                        <h3 class="font-display text-4xl md:text-6xl text-white mb-6">
                            @if($featuredProducts->count() > 1)
                                {{ $featuredProducts[1]->name }}
                            @else
                                Petite Paris
                            @endif
                        </h3>
                        <div class="h-[1px] w-24 gold-gradient ml-auto mb-6"></div>
                        <p class="font-serif text-white/60 leading-relaxed mb-8 text-lg md:pl-24">
                            @if($featuredProducts->count() > 1)
                                {{ Str::limit($featuredProducts[1]->description, 150) }}
                            @else
                                Premium artisan cakes made from the finest ingredients.
                            @endif
                        </p>
                        <div class="flex items-center justify-end gap-4 mb-8">
                            <div class="flex items-center space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-[#d4af37] text-sm"></i>
                                @endfor
                                <span class="text-sm text-white/40 ml-3">(4.8)</span>
                            </div>
                            <div class="text-[#d4af37] font-display font-bold text-3xl">
                                @if($featuredProducts->count() > 1)
                                    {{ number_format($featuredProducts[1]->price / 1000, 0) }}K
                                @else
                                    180K
                                @endif
                            </div>
                        </div>
                        <a href="https://wa.me/6285278803635?text=Halo%20Angel%20Cake,%20saya%20ingin%20memesan%20{{ $featuredProducts->count() > 1 ? urlencode($featuredProducts[1]->name) : 'Petite%20Paris' }}"
                           target="_blank"
                           class="inline-flex items-center gap-3 text-white hover:text-[#d4af37] transition-colors font-display text-xs tracking-widest uppercase group-hover:translate-x-2 transition-transform">
                            Order Now 
                            <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Featured Product 3 -->
            <div class="relative py-20 group">
                <div class="absolute inset-0 bg-[#1a1a1a] transform -skew-y-3 z-0"></div>
                <div class="relative z-10 max-w-5xl mx-auto flex flex-col md:flex-row items-center">
                    <div class="w-full md:w-1/2 p-12">
                        <h3 class="font-display text-4xl text-white mb-4">
                            @if($featuredProducts->count() > 2)
                                {{ $featuredProducts[2]->name }}
                            @else
                                Velvet Cheese
                            @endif
                        </h3>
                        <div class="h-[1px] w-20 gold-gradient mb-6"></div>
                        <p class="font-serif text-white/60 text-lg mb-8">
                            @if($featuredProducts->count() > 2)
                                {{ Str::limit($featuredProducts[2]->description, 100) }}
                            @else
                                Premium artisan cakes made from the finest ingredients.
                            @endif
                        </p>
                        <div class="flex items-center gap-8">
                            <div class="flex items-center space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-[#d4af37] text-sm"></i>
                                @endfor
                            </div>
                            <div class="text-[#d4af37] font-display font-bold text-3xl">
                                @if($featuredProducts->count() > 2)
                                    {{ number_format($featuredProducts[2]->price / 1000, 0) }}K
                                @else
                                    220K
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 relative">
                        <!-- Setengah lingkaran dipertahankan -->
                        <div class="aspect-square max-w-md mx-auto overflow-hidden rounded-t-full border-t border-x border-[#d4af37]/30">
                            @if($featuredProducts->count() > 2)
                            <img src="{{ $featuredProducts[2]->image ? asset('storage/' . $featuredProducts[2]->image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCV8UzAiMpWxwVtwzBHXN9YaArx7Mi_UR6_k5LTVngyp-mNztE1sfnu9v-szykgco9maDzZfp515gWWZeMC81JXWUKvaXq0UJbF85FX0EZSaex0OjCrOOU-TyBV5OHFlu0y5eCf-SNfGa0I7-SQJyzASHt5hHWO6kAcpv2U-7NoM6IbOXMAiZTqXI9KCCeCwRZNhVhPPf_e1LU4i2bLfkYeUYRZ6jzIw7UsdENsXDLo8NYELzo02a7Pg0KI9a8gRx3H0QSaUGcGfkyt' }}" 
                                 alt="{{ $featuredProducts[2]->name }}"
                                 class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-700">
                            @else
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCV8UzAiMpWxwVtwzBHXN9YaArx7Mi_UR6_k5LTVngyp-mNztE1sfnu9v-szykgco9maDzZfp515gWWZeMC81JXWUKvaXq0UJbF85FX0EZSaex0OjCrOOU-TyBV5OHFlu0y5eCf-SNfGa0I7-SQJyzASHt5hHWO6kAcpv2U-7NoM6IbOXMAiZTqXI9KCCeCwRZNhVhPPf_e1LU4i2bLfkYeUYRZ6jzIw7UsdENsXDLo8NYELzo02a7Pg0KI9a8gRx3H0QSaUGcGfkyt" 
                                 alt="Cheesecake"
                                 class="w-full h-full object-cover filter grayscale group-hover:grayscale-0 transition-all duration-700">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bespoke Creations Section - Dinamis -->
    @if($bespokeSection && $bespokeSection->is_active)
    <section class="py-32 px-6 bg-[#0f0f0f] border-t border-white/5 relative">
        <div class="max-w-[1400px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="order-2 lg:order-1 relative">
                    <div class="absolute -top-10 -left-10 w-32 h-32 border-t-2 border-l-2 border-[#d4af37]/30 hidden lg:block"></div>
                    <div class="relative overflow-hidden group">
                        <img src="{{ $bespokeSection->image ? asset('storage/' . $bespokeSection->image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuC9HmW_VsCfJmhqciCLRh_z63gyjQvFEj4HQGdHX5yCUyjiCnC5oNKXr3SQXPRUEoySF5hbvOK4AIS9OTPERInnUwEY16cZTWx5MH9Ta3q3mdNgqqBrkzNjboZU8GHoFDGcHswoLfqiEYQNuhgrLsj7vFLAcmpjIvYpTDoXHZodoyagXYDHyrsegofdW76B4rKuXurd5GJDfOB8h9FpqUy7byYxv5BuzASum1T6UbsefcDgOfvgpixZl-Ngl4ZIIOzfnqolfMX-FQJM' }}" 
                             alt="Bespoke Creation"
                             class="w-full h-auto object-cover grayscale group-hover:grayscale-0 transition-all duration-1000">
                        <div class="absolute bottom-0 right-0 bg-[#050505] p-6 border-t border-l border-white/10">
                            <span class="font-display text-white text-xl">{{ $bespokeSection->image_label }}</span>
                        </div>
                    </div>
                    <div class="absolute -bottom-10 -right-10 w-32 h-32 border-b-2 border-r-2 border-[#d4af37]/30 hidden lg:block"></div>
                </div>
                
                <div class="order-1 lg:order-2 space-y-10">
                    <div>
                        <span class="text-[#d4af37] font-display tracking-[0.3em] uppercase text-sm">Masterpiece</span>
                        <h2 class="font-display text-5xl md:text-7xl text-white mt-4 leading-none">
                            {{ $bespokeSection->title }}<br/>
                            @if($bespokeSection->subtitle)
                            <span class="text-white/30 italic font-serif">{{ $bespokeSection->subtitle }}</span>
                            @endif
                        </h2>
                    </div>
                    <p class="font-serif text-xl text-white/70 leading-relaxed border-l border-[#d4af37] pl-8">
                        {{ $bespokeSection->description }}
                    </p>
                    <div class="flex flex-wrap gap-8 pt-8">
                        @foreach($bespokeSection->features as $feature)
                        <div class="flex flex-col gap-2">
                            <span class="font-display text-2xl text-white">{{ $feature['value'] }}</span>
                            <span class="text-xs uppercase tracking-widest text-white/40">{{ $feature['label'] }}</span>
                        </div>
                        @if(!$loop->last)
                        <div class="w-[1px] h-12 bg-white/10"></div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- All Products Grid with Staggered Layout -->
    <section class="py-24 px-6 bg-[#050505]">
        <div class="max-w-[1400px] mx-auto">
            <div class="flex items-center justify-between mb-16">
                <div>
                    <h3 class="font-display text-4xl text-white mb-3">Complete Collection</h3>
                    <div class="w-32 h-1 gold-gradient"></div>
                </div>
                <a href="#" class="btn-outline-gold inline-flex items-center px-8 py-3 font-display tracking-[0.15em] text-sm">
                    VIEW ALL
                    <i class="fas fa-arrow-right ml-3 transition-transform group-hover:translate-x-1"></i>
                </a>
            </div>
            
            <!-- Staggered Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($allProducts as $index => $product)
                @php
                    // Stagger logic: even indexes go down, odd indexes go up
                    $staggerClass = $index % 2 == 0 ? 'md:mt-12' : 'md:-mt-8';
                    if ($index % 4 == 0) $staggerClass = '';
                    if ($index % 4 == 1) $staggerClass = 'md:mt-8';
                    if ($index % 4 == 2) $staggerClass = 'md:mt-4';
                    if ($index % 4 == 3) $staggerClass = 'md:-mt-4';
                @endphp
                
                <div class="card-hover overflow-hidden group relative {{ $staggerClass }} transition-all duration-300 hover:z-10">
                    <!-- Badge -->
                    <div class="absolute top-4 left-4 z-20">
                        <div class="bg-[#d4af37] px-3 py-1 rounded-full">
                            <span class="font-display text-[10px] tracking-widest uppercase text-[#050505]">NEW</span>
                        </div>
                    </div>
                    
                    <!-- Product Image -->
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80' }}" 
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-40"></div>
                        
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <a href="https://wa.me/6285278803635?text=Halo%20Angel%20Cake,%20saya%20tertarik%20dengan%20{{ urlencode($product->name) }}"
                               target="_blank"
                               class="px-6 py-3 btn-premium text-xs font-display tracking-[0.15em] transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                ORDER NOW
                            </a>
                        </div>
                    </div>
                    
                    <!-- Product Info -->
                    <div class="p-6">
                        <h4 class="font-display text-lg text-white mb-2 truncate">{{ $product->name }}</h4>
                        <p class="text-white/40 text-xs mb-4 line-clamp-2 font-serif h-10">{{ Str::limit($product->description, 60) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-[#d4af37] font-display text-xl">{{ number_format($product->price / 1000, 0) }}K</span>
                            <div class="flex items-center space-x-1">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-[#d4af37] text-xs"></i>
                                @endfor
                                <span class="text-white/30 text-xs ml-1">(4.9)</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Decorative border bottom -->
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-[#d4af37]/30 to-transparent"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Services Section -->
    <section class="py-32 px-6 bg-[#0f0f0f] border-t border-white/5">
        <div class="max-w-[1400px] mx-auto">
            <div class="text-center mb-20">
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-[#d4af37]/50"></div>
                    <i class="fas fa-crown text-[#d4af37] text-3xl"></i>
                    <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-[#d4af37]/50"></div>
                </div>
                <h2 class="font-display text-4xl md:text-5xl text-white mb-6">Our Premium Services</h2>
                <div class="w-24 h-1 gold-gradient mx-auto rounded-full opacity-50"></div>
                <p class="text-white/60 max-w-2xl mx-auto mt-8 font-serif text-lg">
                    Experience the ultimate in luxury baking with our comprehensive range of premium services
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                    $services = [
                        ['icon' => 'fa-palette', 'title' => 'Custom Design', 'desc' => 'Bespoke cake designs tailored to your vision and celebration theme.'],
                        ['icon' => 'fa-truck', 'title' => 'Premium Delivery', 'desc' => 'White-glove delivery service ensuring perfect condition arrival.'],
                        ['icon' => 'fa-calendar-alt', 'title' => 'Event Catering', 'desc' => 'Full-service catering for weddings and corporate celebrations.'],
                        ['icon' => 'fa-star', 'title' => 'Signature Collection', 'desc' => 'Our best-selling cakes and cookies, crafted with signature recipes.'],
                    ];
                @endphp
                
                @foreach($services as $service)
                <div class="card-hover p-8 text-center group relative rounded-lg">
                    <div class="w-20 h-20 border border-[#d4af37]/20 mx-auto flex items-center justify-center mb-8 group-hover:border-[#d4af37]/50 transition-colors duration-300 rounded-full">
                        <i class="fas {{ $service['icon'] }} text-[#d4af37] text-2xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-white mb-4">{{ $service['title'] }}</h3>
                    <div class="w-12 h-[1px] bg-[#d4af37]/30 mx-auto mb-6"></div>
                    <p class="text-white/40 text-sm font-serif leading-relaxed">
                        {{ $service['desc'] }}
                    </p>
                    
                    <!-- Hover effect line -->
                    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-0 h-1 bg-[#d4af37] group-hover:w-full transition-all duration-500"></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="reviews" class="py-32 px-6 relative overflow-hidden bg-[#050505] border-t border-white/5">
        <div class="max-w-6xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-[#d4af37]/50"></div>
                    <i class="fas fa-quote-left text-[#d4af37] text-3xl"></i>
                    <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-[#d4af37]/50"></div>
                </div>
                <h2 class="font-display text-4xl md:text-5xl text-white mb-6">Client Testimonials</h2>
                <p class="text-white/60 max-w-2xl mx-auto mt-8 font-serif text-lg">
                    Hear from those who have experienced our exceptional service
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($reviews as $review)
                <div class="bg-[#1a1a1a] p-8 rounded-lg border border-white/5 hover:border-[#d4af37]/20 transition-colors duration-300">
                    <!-- Quote Icon -->
                    <div class="text-[#d4af37]/20 mb-6">
                        <i class="fas fa-quote-left text-4xl"></i>
                    </div>
                    
                    <!-- Review Text -->
                    <p class="text-white/70 italic mb-8 leading-relaxed font-serif text-base">
                        "{{ $review->review }}"
                    </p>
                    
                    <div class="w-full h-[1px] bg-white/10 mb-8"></div>
                    
                    <!-- Customer Info -->
                    <div class="flex items-center">
                        <div class="w-14 h-14 border border-[#d4af37]/20 flex items-center justify-center text-[#d4af37] font-display text-xl mr-5 rounded-full">
                            {{ strtoupper(substr($review->customer_name, 0, 1)) }}
                        </div>
                        <div>
                            <h4 class="font-display text-white text-lg mb-2">{{ $review->customer_name }}</h4>
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $review->rating)
                                        <i class="fas fa-star text-[#d4af37] text-sm"></i>
                                    @else
                                        <i class="far fa-star text-[#d4af37] text-sm"></i>
                                    @endif
                                @endfor
                                <span class="text-white/40 text-xs ml-2">({{ $review->rating }}/5)</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-32 bg-[#0f0f0f] border-t border-white/5">
        <div class="max-w-[1400px] mx-auto px-6">
            <div class="text-center mb-20">
                <div class="flex items-center justify-center gap-6 mb-8">
                    <div class="h-[1px] w-16 bg-gradient-to-r from-transparent to-[#d4af37]/50"></div>
                    <i class="fas fa-envelope text-[#d4af37] text-3xl"></i>
                    <div class="h-[1px] w-16 bg-gradient-to-l from-transparent to-[#d4af37]/50"></div>
                </div>
                <h2 class="font-display text-4xl md:text-5xl text-white mb-4">Create Your Masterpiece</h2>
                <div class="w-24 h-1 gold-gradient mx-auto rounded-full opacity-50"></div>
                <p class="text-white/60 max-w-2xl mx-auto mt-8 font-serif text-lg">
                    Let us craft the perfect centerpiece for your celebration. Contact our team for a personalized consultation.
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Info -->
                <div class="glass-effect p-8 rounded-xl">
                    <h3 class="font-display text-2xl text-white mb-8">Visit Our Bakery</h3>
                    <div class="space-y-8">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 border border-[#d4af37]/20 flex items-center justify-center rounded-lg flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-[#d4af37] text-lg"></i>
                            </div>
                            <div>
                                <p class="text-white font-serif text-lg mb-1">Sianok Anam Suku, IV Koto</p>
                                <p class="text-white/60 font-serif text-sm">Agam Regency, West Sumatra 26161</p>
                                <p class="text-white/60 font-serif text-sm">Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 border border-[#d4af37]/20 flex items-center justify-center rounded-lg flex-shrink-0">
                                <i class="fas fa-clock text-[#d4af37] text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center border-b border-white/10 pb-3 mb-3">
                                    <span class="text-white/60 font-serif">Monday - Saturday</span>
                                    <span class="text-[#d4af37] font-display">8:00 AM - 8:00 PM</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-white/60 font-serif">Sunday</span>
                                    <span class="text-[#d4af37] font-display">9:00 AM - 6:00 PM</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 pt-8 border-t border-white/10">
                            <a href="https://wa.me/6285278803635" 
                               target="_blank"
                               class="w-12 h-12 border border-[#d4af37]/20 hover:border-[#d4af37]/50 flex items-center justify-center rounded-lg transition-colors duration-300 group">
                                <i class="fab fa-whatsapp text-[#d4af37] text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="tel:+6285278803635"
                               class="w-12 h-12 border border-[#d4af37]/20 hover:border-[#d4af37]/50 flex items-center justify-center rounded-lg transition-colors duration-300 group">
                                <i class="fas fa-phone text-[#d4af37] text-lg group-hover:scale-110 transition-transform"></i>
                            </a>
                            <div class="ml-4">
                                <p class="text-white font-display text-lg">+62 852 7880 3635</p>
                                <p class="text-white/40 text-xs font-serif">Available 24/7 for inquiries</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Contact -->
                <div class="glass-effect p-8 rounded-xl">
                    <h3 class="font-display text-2xl text-white mb-8">Quick Consultation</h3>
                    <p class="text-white/60 font-serif text-lg mb-12 leading-relaxed">
                        Discuss your vision with our artisans to create a fully personalized dream cake.
                    </p>
                    
                    <div class="space-y-6">
                        <a href="https://wa.me/6285278803635" 
                           target="_blank"
                           class="btn-premium inline-flex items-center justify-center px-8 py-5 font-display tracking-[0.15em] text-sm w-full rounded-lg group">
                            <i class="fab fa-whatsapp mr-3 text-xl group-hover:rotate-12 transition-transform"></i>
                            WhatsApp Consultation
                            <i class="fas fa-arrow-right ml-3 transform transition-transform group-hover:translate-x-2"></i>
                        </a>
                        
                        <a href="tel:+6285278803635"
                           class="btn-outline-gold inline-flex items-center justify-center px-8 py-5 font-display tracking-[0.15em] text-sm w-full rounded-lg group">
                            <i class="fas fa-phone mr-3 group-hover:rotate-12 transition-transform"></i>
                            Call Now
                            <i class="fas fa-arrow-right ml-3 transform transition-transform group-hover:translate-x-2"></i>
                        </a>
                    </div>
                    
                    <div class="mt-12 pt-8 border-t border-white/10">
                        <p class="text-white/40 text-sm font-serif italic">
                            For custom orders and large events, please contact us at least 48 hours in advance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-10 right-10 z-50">
        <a href="https://wa.me/6285278803635" 
           target="_blank"
           class="btn-floating-gold w-20 h-20 flex items-center justify-center text-2xl shadow-2xl rounded-full group animate-float">
            <i class="fab fa-whatsapp group-hover:scale-110 transition-transform"></i>
        </a>
    </div>
@endsection