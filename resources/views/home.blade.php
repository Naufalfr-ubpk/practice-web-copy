@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-8">

    {{-- ========== HERO CAROUSEL ========== --}}
    <div class="relative rounded-2xl overflow-hidden h-[340px]" id="heroCarousel">
        {{-- Slides --}}
        <div class="carousel-track h-full relative">
            {{-- Slide 1 --}}
            <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-700">
                <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Banner 1" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 to-gray-900/30"></div>
                <div class="relative z-10 flex items-center h-full px-12 md:px-16">
                    <div class="max-w-md">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight translatable" data-id="Setup Keren<br>dan Powerful" data-en="Cool and<br>Powerful Setup">Setup Keren<br>dan Powerful</h2>
                        <p class="text-gray-300 text-sm mt-2 translatable" data-id="Aksesoris PC Performa Maksimal" data-en="Maximum Performance PC Accessories">Aksesoris PC Performa Maksimal</p>
                        <p class="text-gray-400 text-xs line-through mt-4">Rp15.000.000</p>
                        <p class="text-4xl md:text-5xl font-black text-teal-400 mt-1">Rp12.500.000</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-5 border border-white/70 text-white text-xs font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-gray-900 transition-colors translatable" data-id="Cek Sekarang" data-en="Check Now">Cek Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-700">
                <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Banner 2" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-900/30"></div>
                <div class="relative z-10 flex items-center h-full px-12 md:px-16">
                    <div class="max-w-md">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight translatable" data-id="Power Supply<br>Terbaik 2024" data-en="Best Power Supply<br>2024">Power Supply<br>Terbaik 2024</h2>
                        <p class="text-blue-200 text-sm mt-2 translatable" data-id="Corsair RM Series - Gold Rated" data-en="Corsair RM Series - Gold Rated">Corsair RM Series - Gold Rated</p>
                        <p class="text-gray-400 text-xs line-through mt-4">Rp3.200.000</p>
                        <p class="text-4xl md:text-5xl font-black text-teal-400 mt-1">Rp2.400.000</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-5 border border-white/70 text-white text-xs font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-gray-900 transition-colors translatable" data-id="Cek Sekarang" data-en="Check Now">Cek Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-700">
                <img src="https://images.unsplash.com/photo-1591488320449-011701bb6704?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Banner 3" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-900/80 to-purple-900/30"></div>
                <div class="relative z-10 flex items-center h-full px-12 md:px-16">
                    <div class="max-w-md">
                        <h2 class="text-3xl md:text-4xl font-extrabold text-white leading-tight translatable" data-id="VGA RTX 4080<br>Super 16GB" data-en="RTX 4080<br>Super 16GB VGA">VGA RTX 4080<br>Super 16GB</h2>
                        <p class="text-purple-200 text-sm mt-2 translatable" data-id="Ray Tracing Ultra untuk Gamers" data-en="Ultra Ray Tracing for Gamers">Ray Tracing Ultra untuk Gamers</p>
                        <p class="text-gray-400 text-xs line-through mt-4">Rp21.000.000</p>
                        <p class="text-4xl md:text-5xl font-black text-teal-400 mt-1">Rp18.900.000</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-5 border border-white/70 text-white text-xs font-semibold rounded-full px-6 py-2 hover:bg-white hover:text-gray-900 transition-colors translatable" data-id="Cek Sekarang" data-en="Check Now">Cek Sekarang</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Arrows --}}
        <button onclick="prevSlide()" class="absolute left-3 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/40 text-white transition z-20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="nextSlide()" class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/40 text-white transition z-20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>

        {{-- Dots --}}
        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 flex gap-1.5 z-20" id="carouselDots">
            <button onclick="goToSlide(0)" class="carousel-dot w-5 h-2 rounded-full bg-teal-400 transition-all"></button>
            <button onclick="goToSlide(1)" class="carousel-dot w-2 h-2 rounded-full bg-white/50 transition-all"></button>
            <button onclick="goToSlide(2)" class="carousel-dot w-2 h-2 rounded-full bg-white/50 transition-all"></button>
        </div>
    </div>

    {{-- ========== FEATURES ========== --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 transition-colors duration-300">
            <span class="shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-teal-50 dark:bg-teal-900/30 text-teal-500 dark:text-teal-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </span>
            <div>
                <p class="text-sm font-bold text-gray-900 dark:text-white translatable" data-id="Gratis Ongkir" data-en="Free Shipping">Gratis Ongkir</p>
                <p class="text-xs text-gray-400 translatable" data-id="Pembelian &gt; Rp 100rb" data-en="Purchases &gt; Rp 100k">Pembelian &gt; Rp 100rb</p>
            </div>
        </div>
        <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 transition-colors duration-300">
            <span class="shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-green-50 dark:bg-green-900/30 text-green-500 dark:text-green-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            <div>
                <p class="text-sm font-bold text-gray-900 dark:text-white translatable" data-id="Produk Original" data-en="Original Products">Produk Original</p>
                <p class="text-xs text-gray-400 translatable" data-id="100% garansi asli" data-en="100% authentic guarantee">100% garansi asli</p>
            </div>
        </div>
        <div class="flex items-center gap-4 p-4 rounded-xl border border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-800 transition-colors duration-300">
            <span class="shrink-0 w-10 h-10 flex items-center justify-center rounded-lg bg-orange-50 dark:bg-orange-900/30 text-orange-500 dark:text-orange-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </span>
            <div>
                <p class="text-sm font-bold text-gray-900 dark:text-white translatable" data-id="Mudah Retur" data-en="Easy Returns">Mudah Retur</p>
                <p class="text-xs text-gray-400 translatable" data-id="30 hari pengembalian" data-en="30-day return policy">30 hari pengembalian</p>
            </div>
        </div>
    </div>

    {{-- ========== CATEGORY PILLS ========== --}}
    <div class="flex gap-2">
        <button class="px-4 py-1.5 text-xs font-semibold border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 hover:border-teal-400 dark:hover:border-teal-500 hover:text-teal-500 dark:hover:text-teal-400 transition-colors translatable" data-id="Komponen PC" data-en="PC Components">Komponen PC</button>
        <button class="px-4 py-1.5 text-xs font-semibold border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 hover:border-teal-400 dark:hover:border-teal-500 hover:text-teal-500 dark:hover:text-teal-400 transition-colors translatable" data-id="Laptop Gaming" data-en="Gaming Laptops">Laptop Gaming</button>
        <button class="px-4 py-1.5 text-xs font-semibold border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 hover:border-teal-400 dark:hover:border-teal-500 hover:text-teal-500 dark:hover:text-teal-400 transition-colors translatable" data-id="Aksesoris" data-en="Accessories">Aksesoris</button>
        <button class="px-4 py-1.5 text-xs font-semibold border border-gray-200 dark:border-gray-700 rounded-full text-gray-700 dark:text-gray-300 hover:border-teal-400 dark:hover:border-teal-500 hover:text-teal-500 dark:hover:text-teal-400 transition-colors translatable" data-id="Monitor" data-en="Monitors">Monitor</button>
    </div>

    {{-- ========== PRODUCT GRID ========== --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach($featuredProducts as $item)
            @include('components.product-card', ['product' => $item])
        @endforeach
    </div>
</div>

{{-- Carousel JS --}}
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;
    let autoSlideTimer;

    function goToSlide(index) {
        slides.forEach((s, i) => { s.style.opacity = i === index ? '1' : '0'; });
        dots.forEach((d, i) => {
            d.classList.toggle('w-5', i === index);
            d.classList.toggle('bg-teal-400', i === index);
            d.classList.toggle('w-2', i !== index);
            d.classList.toggle('bg-white/50', i !== index);
        });
        currentSlide = index;
        resetAutoSlide();
    }

    function nextSlide() { goToSlide((currentSlide + 1) % totalSlides); }
    function prevSlide() { goToSlide((currentSlide - 1 + totalSlides) % totalSlides); }
    function resetAutoSlide() { clearInterval(autoSlideTimer); autoSlideTimer = setInterval(nextSlide, 5000); }

    resetAutoSlide();
</script>
@endsection