<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FoodLumina - @yield('title', 'Autentikasi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        if (localStorage.getItem('theme') === 'dark') document.documentElement.classList.add('dark');
    </script>
</head>
<body class="bg-white dark:bg-gray-900 font-sans antialiased transition-colors duration-300">
    <div class="min-h-screen flex">
        
        {{-- LEFT: Branding Image --}}
        <div class="hidden lg:flex lg:w-1/2 relative bg-gradient-to-br from-gray-900 via-gray-800 to-amber-900 items-center justify-center overflow-hidden">
            {{-- Background Image --}}
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1920&q=80" 
                 alt="Fine Dining" class="absolute inset-0 w-full h-full object-cover opacity-40">
            
            {{-- Gradient Overlay --}}
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-amber-900/30"></div>
            
            {{-- Content --}}
            <div class="relative z-10 px-12 max-w-lg">
                <a href="{{ route('home') }}" class="flex items-center gap-3 mb-10">
                    <div class="p-2 bg-amber-500 rounded-lg shadow-sm">
                        <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <span class="font-black text-4xl tracking-tight text-white">Food<span class="text-amber-500">Lumina</span></span>
                </a>
                <h1 class="text-4xl font-extrabold text-white leading-tight mb-4 translatable" data-id="Eksplorasi Rasa<br>Tanpa Batas" data-en="Explore Limitless<br>Flavors">Eksplorasi Rasa<br>Tanpa Batas</h1>
                <p class="text-gray-300 text-sm leading-relaxed translatable" data-id="Bergabunglah dengan FoodLumina dan nikmati akses eksklusif ke hidangan premium, penawaran spesial, dan layanan reservasi meja prioritas." data-en="Join FoodLumina and enjoy exclusive access to premium dishes, special offers, and priority table reservation services.">Bergabunglah dengan FoodLumina dan nikmati akses eksklusif ke hidangan premium, penawaran spesial, dan layanan reservasi meja prioritas.</p>
                
                {{-- Stats --}}
                <div class="flex gap-8 mt-8">
                    <div>
                        <p class="text-2xl font-bold text-amber-400">10K+</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Pelanggan Setia" data-en="Loyal Customers">Pelanggan Setia</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-amber-400">500+</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Menu Eksklusif" data-en="Exclusive Menus">Menu Eksklusif</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-amber-400">5★</p>
                        <p class="text-xs text-gray-400 mt-1 translatable" data-id="Rating Kualitas" data-en="Quality Rating">Rating Kualitas</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: Form --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 lg:px-16">
            {{-- Mobile Logo --}}
            <a href="{{ route('home') }}" class="lg:hidden flex items-center gap-2 mb-8">
                <div class="p-1.5 bg-amber-500 rounded-lg shadow-sm">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="font-black text-2xl tracking-tight text-gray-900 dark:text-white">Food<span class="text-amber-500">Lumina</span></span>
            </a>

            <div class="w-full max-w-md">
                {{ $slot }}
            </div>

            <p class="text-xs text-gray-400 mt-8"><span class="translatable" data-id="&copy; {{ date('Y') }} FoodLumina. Hak cipta dilindungi." data-en="&copy; {{ date('Y') }} FoodLumina. All rights reserved.">&copy; {{ date('Y') }} FoodLumina. Hak cipta dilindungi.</span></p>
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