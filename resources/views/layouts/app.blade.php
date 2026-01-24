<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <!-- Stylesheets & Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angel Cake - {{ $title ?? 'Toko Kue Premium' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=Cormorant+Garamond:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f97316;
            --secondary: #f59e0b;
            --accent: #fbbf24;
            --dark: #0a0a0a;
            --light: #1a1a1a;
        }
        
        * {
            font-family: 'Syne', sans-serif;
        }
        
        .heading-font {
            font-family: 'Cormorant Garamond', serif;
        }
        
        .script-font {
            font-family: 'Dancing Script', cursive;
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #f97316 0%, #f59e0b 50%, #fbbf24 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glass-effect {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            background: rgba(10, 10, 10, 0.7);
            border: 1px solid rgba(249, 115, 22, 0.2);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #0a0a0a;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f97316, #f59e0b);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #ea580c, #d97706);
        }

        /* Smooth animations */
        * {
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        }

        /* Navigation hover effects */
        .nav-link {
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #f97316, #f59e0b);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Mobile menu animation */
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .mobile-menu-enter {
            animation: slideInRight 0.3s ease-out;
        }

        /* Button glow effect */
        .glow-button {
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.3);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.6), 0 0 60px rgba(249, 115, 22, 0.3);
            transform: translateY(-2px);
        }

        /* Notification animation */
        @keyframes slideInFromRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification-enter {
            animation: slideInFromRight 0.3s ease-out;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-black text-white">
    <!-- Navbar -->
    <nav class="glass-effect fixed w-full z-50 border-b border-orange-500/20">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <a href="/" class="text-3xl md:text-4xl font-bold gradient-text script-font hover:scale-105 transition-transform duration-300">
                    Angel Cake
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#home" class="nav-link text-orange-100 hover:text-orange-400 font-medium">Beranda</a>
                    <a href="#about" class="nav-link text-orange-100 hover:text-orange-400 font-medium">Tentang</a>
                    <a href="#products" class="nav-link text-orange-100 hover:text-orange-400 font-medium">Produk</a>
                    <a href="#reviews" class="nav-link text-orange-100 hover:text-orange-400 font-medium">Review</a>
                    <a href="#contact" class="nav-link text-orange-100 hover:text-orange-400 font-medium">Kontak</a>
                    @if(session('admin_logged_in'))
                        <a href="{{ route('admin.dashboard') }}" class="glow-button bg-gradient-to-r from-orange-500 to-amber-500 text-white px-6 py-2 rounded-full font-medium">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('admin.login') }}" class="glow-button bg-gradient-to-r from-orange-500 to-amber-500 text-white px-6 py-2 rounded-full font-medium">
                            Login Admin
                        </a>
                    @endif
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-orange-300 hover:text-orange-400 focus:outline-none transition-colors">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 bg-black/95 backdrop-blur-xl z-50 hidden">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-between p-6 border-b border-orange-500/20">
                <span class="text-2xl font-bold gradient-text script-font">Angel Cake</span>
                <button id="mobile-menu-close" class="text-orange-300 hover:text-orange-400 focus:outline-none">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto p-6">
                <div class="space-y-6">
                    <a href="#home" class="block text-orange-100 hover:text-orange-400 font-medium text-xl py-3 border-b border-orange-500/10 mobile-menu-link">Beranda</a>
                    <a href="#about" class="block text-orange-100 hover:text-orange-400 font-medium text-xl py-3 border-b border-orange-500/10 mobile-menu-link">Tentang</a>
                    <a href="#products" class="block text-orange-100 hover:text-orange-400 font-medium text-xl py-3 border-b border-orange-500/10 mobile-menu-link">Produk</a>
                    <a href="#reviews" class="block text-orange-100 hover:text-orange-400 font-medium text-xl py-3 border-b border-orange-500/10 mobile-menu-link">Review</a>
                    <a href="#contact" class="block text-orange-100 hover:text-orange-400 font-medium text-xl py-3 border-b border-orange-500/10 mobile-menu-link">Kontak</a>
                    @if(session('admin_logged_in'))
                        <a href="{{ route('admin.dashboard') }}" class="block glow-button bg-gradient-to-r from-orange-500 to-amber-500 text-white px-6 py-4 rounded-2xl font-bold text-center text-xl mt-8">Dashboard</a>
                    @else
                        <a href="{{ route('admin.login') }}" class="block glow-button bg-gradient-to-r from-orange-500 to-amber-500 text-white px-6 py-4 rounded-2xl font-bold text-center text-xl mt-8">Login Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="pt-20"></div> <!-- Spacer for fixed navbar -->

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-neutral-900 via-black to-neutral-900 text-white py-16 border-t border-orange-500/20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div>
                    <h3 class="text-3xl font-bold mb-4 script-font gradient-text">Angel Cake</h3>
                    <p class="text-orange-200/70 leading-relaxed">Kue dengan cinta dari hati, dibuat khusus untuk momen spesial Anda.</p>
                </div>
                
                <div>
                    <h4 class="text-xl font-bold mb-4 text-orange-300">Jam Operasional</h4>
                    <p class="text-orange-200/70 mb-2">Senin - Sabtu: 08:00 - 20:00</p>
                    <p class="text-orange-200/70">Minggu: 09:00 - 17:00</p>
                </div>
                
                <div>
                    <h4 class="text-xl font-bold mb-4 text-orange-300">Sosial Media</h4>
                    <div class="flex space-x-4">
                        <a href="https://wa.me/6281234567890" target="_blank" class="w-12 h-12 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg hover:shadow-green-500/50">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                        <a href="https://instagram.com/angelcake" target="_blank" class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg hover:shadow-pink-500/50">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="mailto:info@angelcake.com" class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-500 to-amber-600 flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg hover:shadow-orange-500/50">
                            <i class="fas fa-envelope text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-orange-500/20 pt-8 text-center">
                <p class="text-orange-200/60">&copy; 2024 Angel Cake. All rights reserved. Made with <i class="fas fa-heart text-orange-500"></i></p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('mobile-menu-enter');
        });

        mobileMenuClose.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });

        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

        // Close mobile menu when clicking outside
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Notification system
        @if(session('success'))
            showNotification('{{ session('success') }}', 'success');
        @endif
        
        @if(session('error'))
            showNotification('{{ session('error') }}', 'error');
        @endif

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification-enter fixed top-24 right-4 z-50 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 ${
                type === 'success' 
                    ? 'bg-gradient-to-r from-green-500 to-emerald-600' 
                    : 'bg-gradient-to-r from-red-500 to-rose-600'
            } text-white font-medium flex items-center gap-3 border ${
                type === 'success' ? 'border-green-400/30' : 'border-red-400/30'
            }`;
            
            notification.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} text-xl"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateX(120%)';
                notification.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        // Navbar scroll effect
        let lastScroll = 0;
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                navbar.style.background = 'rgba(10, 10, 10, 0.95)';
                navbar.style.boxShadow = '0 4px 20px rgba(249, 115, 22, 0.1)';
            } else {
                navbar.style.background = 'rgba(10, 10, 10, 0.7)';
                navbar.style.boxShadow = 'none';
            }
            
            lastScroll = currentScroll;
        });
    </script>
    @stack('scripts')
</body>
</html>