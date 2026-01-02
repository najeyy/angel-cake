<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Angel Cake</title>
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
        }
        
        .elegant-font {
            font-family: 'Playfair Display', serif;
        }
        
        .modern-font {
            font-family: 'Montserrat', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0F0F0F 0%, #1A1A1A 50%, #0F0F0F 100%);
        }
        
        .glass-effect {
            background: rgba(15, 15, 15, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(232, 184, 109, 0.15);
        }
        
        .btn-elegant {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #E8B86D 0%, #C9994A 100%);
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(232, 184, 109, 0.2);
        }
        
        .btn-elegant::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.25), transparent);
            transition: left 0.6s;
        }
        
        .btn-elegant:hover {
            box-shadow: 0 8px 25px rgba(232, 184, 109, 0.35);
            transform: translateY(-2px);
        }
        
        .btn-elegant:hover::before {
            left: 100%;
        }
        
        .card-elegant {
            background: linear-gradient(145deg, #1A1A1A 0%, #0F0F0F 100%);
            border: 1px solid rgba(232, 184, 109, 0.12);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        
        .card-elegant:hover {
            border-color: rgba(232, 184, 109, 0.35);
            transform: translateY(-8px);
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
        
        .ornament-line {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
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
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }
        
        /* Elegant Grid Pattern */
        .grid-pattern {
            background-image: 
                linear-gradient(rgba(232, 184, 109, 0.05) 1px, transparent 1px), 
                linear-gradient(90deg, rgba(232, 184, 109, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #0F0F0F;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #E8B86D, #C9994A);
            border-radius: 4px;
        }
        
        .image-overlay {
            background: linear-gradient(90deg, rgba(15, 15, 15, 0.9) 0%, rgba(15, 15, 15, 0.7) 30%, rgba(15, 15, 15, 0.3) 100%);
        }
        
        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .image-overlay {
                background: linear-gradient(90deg, rgba(15, 15, 15, 0.95) 0%, rgba(15, 15, 15, 0.85) 50%, rgba(15, 15, 15, 0.7) 100%);
            }
        }
        
        @media (max-width: 768px) {
            .image-overlay {
                background: linear-gradient(180deg, rgba(15, 15, 15, 0.95) 0%, rgba(15, 15, 15, 0.9) 30%, rgba(15, 15, 15, 0.85) 100%);
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen overflow-hidden">
    <!-- Main Layout - Landscape dengan Gambar -->
    <div class="flex flex-col lg:flex-row min-h-screen">
        <!-- Left Side - Elegant Image -->
        <div class="lg:w-1/2 relative overflow-hidden animate-slide-in-left">         
            <!-- Elegant Content Overlay -->
            <div class="relative h-full flex flex-col justify-between p-8 lg:p-16">
                <!-- Top Logo -->
                <div class="flex items-center">
                    <div class="w-12 h-12 border border-amber-600/30 flex items-center justify-center rounded-lg mr-4">
                        <i class="fas fa-crown text-amber-600 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white elegant-font">Angel Cake</h2>
                        <p class="text-amber-600/80 modern-font text-xs tracking-[0.2em]">PREMIUM ARTISAN BAKERY</p>
                    </div>
                </div>
                
                <!-- Main Content -->
                <div class="max-w-xl">
                    <!-- Ornamental Line -->
                    <div class="flex items-center mb-8">
                        <div class="h-px w-16 bg-gradient-to-r from-transparent via-amber-600 to-amber-600"></div>
                        <div class="mx-5 px-6 py-2 border border-amber-600/20 rounded-full backdrop-blur-sm">
                            <span class="text-amber-600 text-xs elegant-font tracking-[0.2em] font-light">SINCE 2018</span>
                        </div>
                        <div class="h-px w-16 bg-gradient-to-l from-amber-600 via-amber-600 to-transparent"></div>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6 elegant-font leading-tight">
                        <span class="block text-shadow-gold">Crafting Excellence</span>
                        <span class="block text-amber-600 text-3xl lg:text-4xl font-light mt-4">In Every Slice</span>
                    </h1>
                    
                    <p class="text-neutral-300 text-lg mb-10 leading-relaxed modern-font font-light">
                        Welcome to the exclusive Angel Cake admin portal. Access your dashboard to manage 
                        premium cake collections, client orders, and create unforgettable experiences.
                    </p>
                    
                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-6 mb-10">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 border border-amber-600/20 flex items-center justify-center rounded-lg">
                                <i class="fas fa-shield-alt text-amber-600"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium modern-font">Secure Access</div>
                                <div class="text-amber-600/70 text-xs modern-font">Enterprise Security</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 border border-amber-600/20 flex items-center justify-center rounded-lg">
                                <i class="fas fa-chart-line text-amber-600"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium modern-font">Real-time Analytics</div>
                                <div class="text-amber-600/70 text-xs modern-font">Business Insights</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 border border-amber-600/20 flex items-center justify-center rounded-lg">
                                <i class="fas fa-box text-amber-600"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium modern-font">Order Management</div>
                                <div class="text-amber-600/70 text-xs modern-font">Track & Manage</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 border border-amber-600/20 flex items-center justify-center rounded-lg">
                                <i class="fas fa-users text-amber-600"></i>
                            </div>
                            <div>
                                <div class="text-white font-medium modern-font">Client Database</div>
                                <div class="text-amber-600/70 text-xs modern-font">VIP Management</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Copyright -->
                <div class="text-amber-600/50 modern-font text-xs tracking-[0.15em]">
                    &copy; 2024 Angel Cake Premium Bakery. All rights reserved.
                </div>
            </div>
            
            <!-- Decorative Corner Elements -->
            <div class="absolute top-0 left-0 w-20 h-20 border-t-2 border-l-2 border-amber-600/20"></div>
            <div class="absolute bottom-0 right-0 w-20 h-20 border-b-2 border-r-2 border-amber-600/20"></div>
        </div>
        
        <!-- Right Side - Login Form -->
        <div class="lg:w-1/2 relative overflow-y-auto">
            <!-- Background Pattern -->
            <div class="absolute inset-0 grid-pattern opacity-10"></div>
            
            <!-- Decorative Background Elements -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <div class="absolute -top-20 -right-20 w-[400px] h-[400px] rounded-full opacity-20" style="background: radial-gradient(circle, rgba(232, 184, 109, 0.15) 0%, transparent 70%);"></div>
                <div class="absolute -bottom-20 -left-20 w-[300px] h-[300px] rounded-full opacity-20" style="background: radial-gradient(circle, rgba(232, 184, 109, 0.15) 0%, transparent 70%);"></div>
            </div>
            
            <!-- Login Form Container -->
            <div class="relative z-10 min-h-screen flex items-center justify-center p-4 lg:p-8 xl:p-12">
                <div class="w-full max-w-md animate-fade-in-up">
                    <!-- Decorative Border -->
                    <div class="absolute -inset-4 border border-amber-600/10 rounded-2xl"></div>
                    
                    <!-- Main Card -->
                    <div class="card-elegant rounded-2xl overflow-hidden shadow-2xl relative">
                        <!-- Corner Decorations -->
                        <div class="absolute top-0 left-0 w-12 h-12 border-t-2 border-l-2 border-amber-600/30 z-10"></div>
                        <div class="absolute top-0 right-0 w-12 h-12 border-t-2 border-r-2 border-amber-600/30 z-10"></div>
                        
                        <div class="p-8 lg:p-10">
                            <!-- Logo & Title -->
                            <div class="text-center mb-8">
                                <!-- Ornamental Top -->
                                <div class="flex items-center justify-center mb-6">
                                    <div class="h-px w-10 bg-gradient-to-r from-transparent via-amber-600/50 to-amber-600"></div>
                                    <div class="mx-4 px-5 py-1.5 border border-amber-600/20 rounded-full backdrop-blur-sm">
                                        <i class="fas fa-lock text-amber-600 text-sm"></i>
                                    </div>
                                    <div class="h-px w-10 bg-gradient-to-l from-amber-600 via-amber-600/50 to-transparent"></div>
                                </div>
                                
                                <!-- Titles -->
                                <h1 class="text-3xl font-bold text-white mb-2 elegant-font text-shadow-gold">Admin Access</h1>
                                <p class="text-amber-600 modern-font tracking-[0.15em] text-xs font-medium">SECURE LOGIN PORTAL</p>
                                
                                <!-- Ornament Line -->
                                <div class="ornament-line mt-6 mb-4"></div>
                            </div>
                            
                            <!-- Error Message -->
                            @if(session('error'))
                                <div class="mb-6 p-3 glass-effect border border-red-500/30 text-red-200 rounded-lg modern-font text-sm">
                                    <div class="flex items-center">
                                        <i class="fas fa-exclamation-circle mr-2 text-base"></i>
                                        <span>{{ session('error') }}</span>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Login Form -->
                            <form action="{{ route('admin.login') }}" method="POST">
                                @csrf
                                
                                <div class="space-y-6">
                                    <!-- Username Field -->
                                    <div>
                                        <label class="block text-amber-600 modern-font text-xs font-medium mb-2 tracking-[0.1em]">ADMIN USERNAME</label>
                                        <div class="relative">
                                            <input type="text" 
                                                   name="username" 
                                                   required
                                                   placeholder="Enter admin username"
                                                   class="w-full px-4 py-3 pl-12 glass-effect border border-amber-600/20 rounded-xl text-white placeholder-amber-600/50 modern-font text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-600 focus:ring-opacity-20 transition-all duration-300">
                                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                                <i class="fas fa-user text-amber-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Password Field -->
                                    <div>
                                        <label class="block text-amber-600 modern-font text-xs font-medium mb-2 tracking-[0.1em]">PASSWORD</label>
                                        <div class="relative">
                                            <input type="password" 
                                                   name="password" 
                                                   required
                                                   placeholder="Enter your password"
                                                   class="w-full px-4 py-3 pl-12 glass-effect border border-amber-600/20 rounded-xl text-white placeholder-amber-600/50 modern-font text-sm focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-600 focus:ring-opacity-20 transition-all duration-300">
                                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                                                <i class="fas fa-lock text-amber-600"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Remember Me & Forgot Password -->
                                    <div class="flex items-center justify-between">
                                        <label class="flex items-center">
                                            <input type="checkbox" 
                                                   name="remember"
                                                   class="w-4 h-4 text-amber-600 bg-neutral-900 border-amber-600/30 rounded focus:ring-amber-600 focus:ring-offset-neutral-900 focus:ring-2 focus:ring-offset-2">
                                            <span class="ml-2 text-sm text-amber-600/80 modern-font">Remember me</span>
                                        </label>
                                        
                                        <a href="#" class="text-sm text-amber-600/70 hover:text-amber-600 modern-font transition-colors duration-300">
                                            Forgot password?
                                        </a>
                                    </div>
                                    
                                    <!-- Submit Button -->
                                    <button type="submit"
                                            class="w-full btn-elegant text-white py-3 rounded-xl font-semibold modern-font tracking-[0.15em] text-sm hover:shadow-xl transition-all duration-300 mt-2">
                                        <i class="fas fa-sign-in-alt mr-2"></i> ACCESS DASHBOARD
                                    </button>
                                </div>
                            </form>
                            
                            <!-- Back Link -->
                            <div class="mt-8 text-center pt-6 border-t border-amber-600/10">
                                <a href="{{ route('home') }}" class="text-amber-600/70 hover:text-amber-600 modern-font text-sm transition-colors duration-300 flex items-center justify-center">
                                    <i class="fas fa-arrow-left mr-2"></i> Return to Homepage
                                </a>
                            </div>
                        </div>
                        
                        <!-- Bottom Corner Decorations -->
                        <div class="absolute bottom-0 left-0 w-12 h-12 border-b-2 border-l-2 border-amber-600/30 z-10"></div>
                        <div class="absolute bottom-0 right-0 w-12 h-12 border-b-2 border-r-2 border-amber-600/30 z-10"></div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="mt-6 text-center">
                        <p class="text-amber-600/50 modern-font text-xs tracking-[0.1em]">
                            <i class="fas fa-info-circle mr-1"></i>
                            Restricted access. Authorized personnel only.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Mobile Back Link (Only shown on mobile) -->
            <div class="lg:hidden fixed bottom-4 left-4 z-20">
                <a href="{{ route('home') }}" 
                   class="glass-effect border border-amber-600/20 text-amber-600 px-4 py-2 rounded-lg modern-font text-sm flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Home
                </a>
            </div>
        </div>
    </div>
    
    <!-- Floating Particles Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.style.position = 'fixed';
            canvas.style.top = '0';
            canvas.style.left = '0';
            canvas.style.width = '100%';
            canvas.style.height = '100%';
            canvas.style.zIndex = '0';
            canvas.style.pointerEvents = 'none';
            document.body.prepend(canvas);
            
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            
            const particles = [];
            const particleCount = 80;
            
            class Particle {
                constructor() {
                    this.x = Math.random() * canvas.width;
                    this.y = Math.random() * canvas.height;
                    this.size = Math.random() * 2 + 0.5;
                    this.speedX = Math.random() * 0.3 - 0.15;
                    this.speedY = Math.random() * 0.3 - 0.15;
                    this.color = `rgba(232, 184, 109, ${Math.random() * 0.08})`;
                }
                
                update() {
                    this.x += this.speedX;
                    this.y += this.speedY;
                    
                    // Wrap around edges
                    if (this.x > canvas.width) this.x = 0;
                    if (this.x < 0) this.x = canvas.width;
                    if (this.y > canvas.height) this.y = 0;
                    if (this.y < 0) this.y = canvas.height;
                }
                
                draw() {
                    ctx.fillStyle = this.color;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }
            
            function init() {
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
            }
            
            function animate() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                
                for (let i = 0; i < particles.length; i++) {
                    particles[i].update();
                    particles[i].draw();
                    
                    // Draw connections between close particles
                    for (let j = i; j < particles.length; j++) {
                        const dx = particles[i].x - particles[j].x;
                        const dy = particles[i].y - particles[j].y;
                        const distance = Math.sqrt(dx * dx + dy * dy);
                        
                        if (distance < 100) {
                            ctx.beginPath();
                            ctx.strokeStyle = `rgba(232, 184, 109, ${0.04 * (1 - distance/100)})`;
                            ctx.lineWidth = 0.2;
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.stroke();
                        }
                    }
                }
                
                requestAnimationFrame(animate);
            }
            
            window.addEventListener('resize', function() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            });
            
            init();
            animate();
        });
    </script>
</body>
</html>