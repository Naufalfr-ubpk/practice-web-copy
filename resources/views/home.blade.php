@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-8">

    {{-- ========== HERO CAROUSEL (GLASSMORPHISM) ========== --}}
    <div class="relative rounded-3xl overflow-hidden h-[400px] shadow-2xl" id="heroCarousel">
        <div class="carousel-track h-full relative">
            {{-- Slide 1 --}}
            <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-700">
                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=1920&q=80" alt="Banner 1" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40"></div>
                <div class="relative z-10 flex items-center h-full px-8 md:px-16">
                    <div class="max-w-xl backdrop-blur-md bg-white/10 dark:bg-black/30 border border-white/20 p-8 rounded-2xl shadow-lg">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight translatable" data-id="Sajian Premium<br>Bintang Lima" data-en="Premium Five-Star<br>Cuisine">Sajian Premium<br>Bintang Lima</h2>
                        <p class="text-gray-200 text-base mt-3 translatable" data-id="Nikmati Wagyu A5 pilihan chef terbaik." data-en="Enjoy our chef's best selection of Wagyu A5.">Nikmati Wagyu A5 pilihan chef terbaik.</p>
                        <p class="text-4xl md:text-5xl font-black text-amber-400 mt-4">Rp 850.000</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-6 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-full px-8 py-3 transition-colors translatable" data-id="Pesan Sekarang" data-en="Order Now">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-700">
                    <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?auto=format&fit=crop&w=1920&q=80" alt="Banner 2" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/40"></div>

                <div class="relative z-10 flex items-center h-full px-8 md:px-16">
                    <div class="max-w-xl backdrop-blur-md bg-white/10 dark:bg-black/30 border border-white/20 p-8 rounded-2xl shadow-lg">
                        <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight translatable" data-id="Manisnya<br>Hari Ini" data-en="Sweetness of<br>Today">Manisnya<br>Hari Ini</h2>
                        <p class="text-gray-200 text-base mt-3 translatable" data-id="Dessert eksklusif dari pastry chef kami." data-en="Exclusive desserts from our pastry chef.">Dessert eksklusif dari pastry chef kami.</p>
                        <p class="text-4xl md:text-5xl font-black text-amber-400 mt-4">Mulai Rp 65k</p>
                        <a href="{{ route('products.index') }}" class="inline-block mt-6 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-full px-8 py-3 transition-colors translatable" data-id="Lihat Menu" data-en="View Menu">Lihat Menu</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Arrows & Dots --}}
        <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-md border border-white/30 text-white transition z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </button>
        <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/40 backdrop-blur-md border border-white/30 text-white transition z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
        <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20" id="carouselDots">
            <button onclick="goToSlide(0)" class="carousel-dot w-6 h-2.5 rounded-full bg-amber-500 transition-all shadow-md"></button>
            <button onclick="goToSlide(1)" class="carousel-dot w-2.5 h-2.5 rounded-full bg-white/60 backdrop-blur-sm transition-all shadow-md"></button>
        </div>
    </div>

    {{-- ========== CATEGORY PILLS ========== --}}
    <div class="flex flex-wrap gap-3 justify-center my-6">
        <button onclick="setActiveCategory(this)" class="category-pill px-5 py-2 text-sm font-bold border rounded-full transition-all shadow-sm translatable border-amber-200 dark:border-amber-900/50 bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-400" data-id="Appetizer" data-en="Appetizer">Appetizer</button>
        
        <button onclick="setActiveCategory(this)" class="category-pill px-5 py-2 text-sm font-bold border rounded-full transition-all shadow-sm translatable border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:border-amber-400 hover:text-amber-500" data-id="Hidangan Utama" data-en="Main Course">Hidangan Utama</button>
        
        <button onclick="setActiveCategory(this)" class="category-pill px-5 py-2 text-sm font-bold border rounded-full transition-all shadow-sm translatable border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:border-amber-400 hover:text-amber-500" data-id="Pencuci Mulut" data-en="Desserts">Pencuci Mulut</button>
        
        <button onclick="setActiveCategory(this)" class="category-pill px-5 py-2 text-sm font-bold border rounded-full transition-all shadow-sm translatable border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:border-amber-400 hover:text-amber-500" data-id="Minuman" data-en="Beverages">Minuman</button>
    </div>


    {{-- ========== PRODUCT GRID ========== --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @foreach($featuredProducts as $item)
            @include('components.product-card', ['product' => $item])
        @endforeach
    </div>
</div>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    const totalSlides = slides.length;
    let autoSlideTimer;

    function goToSlide(index) {
        slides.forEach((s, i) => { s.style.opacity = i === index ? '1' : '0'; });
        dots.forEach((d, i) => {
            d.classList.toggle('w-6', i === index);
            d.classList.toggle('bg-amber-500', i === index);
            d.classList.toggle('w-2.5', i !== index);
            d.classList.toggle('bg-white/60', i !== index);
        });
        currentSlide = index;
        resetAutoSlide();
    }
    function nextSlide() { goToSlide((currentSlide + 1) % totalSlides); }
    function prevSlide() { goToSlide((currentSlide - 1 + totalSlides) % totalSlides); }
    function resetAutoSlide() { clearInterval(autoSlideTimer); autoSlideTimer = setInterval(nextSlide, 5000); }
    resetAutoSlide();

// Fungsi klik interaktif buat kategori pills
    function setActiveCategory(btn) {
        // Reset semua tombol ke abu-abu (tidak aktif)
        document.querySelectorAll('.category-pill').forEach(el => {
            el.classList.remove('border-amber-200', 'bg-amber-50', 'text-amber-700', 'dark:border-amber-900/50', 'dark:bg-amber-900/20', 'dark:text-amber-400');
            el.classList.add('border-gray-200', 'bg-white', 'text-gray-700', 'dark:border-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300', 'hover:border-amber-400', 'hover:text-amber-500');
        });
        
        // Kasih warna amber (aktif) ke tombol yang di-klik
        btn.classList.remove('border-gray-200', 'bg-white', 'text-gray-700', 'dark:border-gray-700', 'dark:bg-gray-800', 'dark:text-gray-300', 'hover:border-amber-400', 'hover:text-amber-500');
        btn.classList.add('border-amber-200', 'bg-amber-50', 'text-amber-700', 'dark:border-amber-900/50', 'dark:bg-amber-900/20', 'dark:text-amber-400');
    }

</script>
@endsection