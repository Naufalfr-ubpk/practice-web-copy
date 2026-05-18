@extends('layouts.app')

@section('title', $product['name_id'])

@section('content')
<div class="max-w-7xl mx-auto">
    {{-- Breadcrumb (Glassmorphism) --}}
    <nav class="flex px-5 py-3 text-sm text-gray-600 dark:text-gray-300 mb-6 backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 border border-gray-200/50 dark:border-gray-700/50 rounded-2xl" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('home') }}" class="hover:text-amber-500 transition-colors translatable" data-id="Beranda" data-en="Home">Beranda</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <a href="{{ route('products.index') }}" class="hover:text-amber-500 transition-colors translatable" data-id="Menu" data-en="Menu">Menu</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    <span class="text-amber-600 dark:text-amber-400 font-bold truncate max-w-[150px] md:max-w-none">{{ $product['name_id'] }}</span>
                </div>
            </li>
        </ol>
    </nav>

    {{-- Detail Card --}}
    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-8 lg:p-10">
            
            {{-- KIRI: Gambar Produk --}}
            <div class="space-y-4">
                <div class="aspect-square bg-gray-50 dark:bg-gray-900 rounded-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name_id'] }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                </div>
            </div>

            {{-- KANAN: Detail & Form Tambah ke Keranjang --}}
            <div class="flex flex-col">
                <div class="mb-6 border-b border-gray-200/50 dark:border-gray-700/50 pb-6">
                    <p class="text-xs font-bold text-amber-500 tracking-wider uppercase mb-2 translatable" data-id="{{ $product['category_id'] }}" data-en="{{ $product['category_en'] }}">{{ $product['category_id'] }}</p>
                    <h1 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white leading-tight mb-4">
                        {{ $product['name_id'] }}
                    </h1>
                    
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <span class="ml-1 text-sm font-bold text-gray-700 dark:text-gray-300">4.9</span>
                            <span class="ml-1 text-xs text-gray-400 translatable" data-id="(128 ulasan)" data-en="(128 reviews)">(128 ulasan)</span>
                        </div>
                        <span class="text-gray-300 dark:text-gray-600">|</span>
                        <div class="text-sm">
                            <span class="text-gray-500 dark:text-gray-400 translatable" data-id="Terpesan" data-en="Ordered">Terpesan</span>
                            <span class="font-bold text-gray-700 dark:text-gray-300 ml-1">450+</span>
                        </div>
                    </div>

                    <p class="text-4xl font-black text-amber-500">
                        Rp {{ number_format($product['price'], 0, ',', '.') }}
                    </p>
                </div>

                {{-- Spesifikasi Ringkas --}}
                <div class="mb-8">
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-3 translatable" data-id="Informasi Sajian:" data-en="Dish Information:">Informasi Sajian:</h3>
                    <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                        @foreach($product['specifications'] as $key => $value)
                            <li class="flex items-start">
                                <svg class="w-4 h-4 text-amber-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <div><span class="font-semibold text-gray-800 dark:text-gray-200">{{ $key }}:</span> {{ $value }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-auto pt-6 border-t border-gray-200/50 dark:border-gray-700/50 flex flex-col sm:flex-row gap-4">
                    {{-- Form Add To Cart --}}
                    <form action="{{ route('cart.store') }}" method="POST" class="flex flex-1 gap-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                        
                      {{-- Kuantitas --}}
                        <div class="flex items-center border border-gray-200 dark:border-gray-600 rounded-xl overflow-hidden bg-white/50 dark:bg-gray-800/50 w-32 shrink-0">
                            <button type="button" class="px-3 py-3.5 text-gray-500 hover:text-amber-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition" onclick="let q=document.getElementById('qty'); q.value=Math.max(1, parseInt(q.value)-1)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                            </button>
                            <input type="number" id="qty" name="quantity" value="1" min="1" max="{{ $product['stock'] }}" class="w-full text-center text-sm font-bold border-none ring-0 focus:ring-0 p-0 text-gray-900 dark:text-white bg-transparent" readonly>
                            <button type="button" class="px-3 py-3.5 text-gray-500 hover:text-amber-500 hover:bg-gray-100 dark:hover:bg-gray-700 transition" onclick="let q=document.getElementById('qty'); q.value=Math.min(parseInt(q.getAttribute('max')), parseInt(q.value)+1)">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </div>

                        {{-- Tombol --}}
                        <button type="submit" class="flex-1 flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white font-bold px-6 py-3.5 rounded-xl transition-all shadow-lg shadow-amber-500/25">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <span class="translatable" data-id="Tambah Pesanan" data-en="Add to Order">Tambah Pesanan</span>
                        </button>
                    </form>
                </div>
                <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span class="translatable" data-id="Stok tersedia:" data-en="Stock available:">Stok tersedia:</span> <span class="font-bold text-gray-700 dark:text-gray-300">{{ $product['stock'] }} porsi</span>
                </p>
            </div>
        </div>

        {{-- Deskripsi Panjang --}}
        <div class="border-t border-gray-200/50 dark:border-gray-700/50 p-6 md:p-10 bg-white/30 dark:bg-gray-900/30">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 translatable" data-id="Deskripsi Sajian" data-en="Dish Description">Deskripsi Sajian</h2>
            <div class="prose dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 text-sm md:text-base leading-relaxed">
                <p>{{ $product['description'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection