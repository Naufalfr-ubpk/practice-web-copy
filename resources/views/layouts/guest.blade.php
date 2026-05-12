<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TechStore - @yield('title', 'Autentikasi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('theme') === 'dark') document.documentElement.classList.add('dark');
    </script>
</head>
<body class="bg-white dark:bg-gray-900 font-sans antialiased transition-colors duration-300">
    <div class="min-h-screen flex">
        
        {{-- LEFT: Branding Image --}}
        <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-gray-900 via-gray-800 to-teal-900 items-center justify-center overflow-hidden">
            {{-- Background Image --}}
            <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" 
                 alt="Setup PC" class="absolute inset-0 w-full h-full object-cover opacity-30">
            
            {{-- Gradient Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-teal-900/50"></div>
            
            {{-- Content --}}
            <div class="relative z-10 px-12 max-w-lg">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-10">
                    <svg class="h-10 w-10 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="font-bold text-3xl text-white">TechStore</span>
                </a>
                <h1 class="text-4xl font-extrabold text-white leading-tight mb-4 translatable" data-id="Bangun Setup<br>Impianmu" data-en="Build Your<br>Dream Setup">Bangun Setup<br>Impianmu</h1>
                <p class="text-gray-300 text-sm leading-relaxed translatable" data-id="Temukan komponen PC, laptop gaming, dan aksesoris berkualitas dengan harga terbaik. Bergabunglah dengan ribuan teknisi dan gamer yang sudah mempercayai kami." data-en="Find high-quality PC components, gaming laptops, and accessories at the best prices. Join thousands of technicians and gamers who trust us.">Temukan komponen PC, laptop gaming, dan aksesoris berkualitas dengan harga terbaik. Bergabunglah dengan ribuan teknisi dan gamer yang sudah mempercayai kami.</p>
                
                {{-- Stats --}}
                <div class="flex gap-8 mt-8">
                    <div>
                        <p class="text-2xl font-bold text-teal-400">10K+</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Pelanggan Aktif" data-en="Active Customers">Pelanggan Aktif</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-teal-400">5K+</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Produk Tersedia" data-en="Products Available">Produk Tersedia</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-teal-400">99%</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Rating Positif" data-en="Positive Rating">Rating Positif</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Form --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-16">
            {{-- Mobile Logo --}}
            <a href="{{ route('home') }}" class="lg:hidden flex items-center gap-2 mb-8">
                <svg class="h-8 w-8 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="font-bold text-2xl text-gray-900 dark:text-white">TechStore</span>
            </a>

            <div class="w-full max-w-md">
                {{ $slot }}
            </div>

            <p class="text-xs text-gray-400 mt-8"><span class="translatable" data-id="&copy; {{ date('Y') }} TechStore. Hak cipta dilindungi." data-en="&copy; {{ date('Y') }} TechStore. All rights reserved.">&copy; {{ date('Y') }} TechStore. Hak cipta dilindungi.</span></p>
        </div>

    </div>

    {{-- Script Translate Terpisah biar aman --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const savedLang = localStorage.getItem('lang') || 'ID';
            const elements = document.querySelectorAll('.translatable');
            elements.forEach(el => {
                if (savedLang === 'EN' && el.getAttribute('data-en')) {
                    el.innerHTML = el.getAttribute('data-en');
                } else if (savedLang === 'ID' && el.getAttribute('data-id')) {
                    el.innerHTML = el.getAttribute('data-id');
                }
            });
        });
    </script>
</body>
</html>