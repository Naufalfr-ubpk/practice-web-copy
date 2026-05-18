<div class="group relative rounded-2xl overflow-hidden backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 border border-gray-200/50 dark:border-gray-700/50 hover:shadow-xl hover:shadow-amber-500/10 transition-all duration-300">

    <a href="{{ route('products.show', $product['slug'] ?? 'slug') }}" class="block aspect-[4/3] overflow-hidden">

        <img src="{{ $product['image'] }}" alt="{{ $product['name_id'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
        <div class="absolute top-2 right-2 bg-white/80 dark:bg-black/60 backdrop-blur-sm px-2 py-1 rounded-md text-[10px] font-bold text-amber-600 dark:text-amber-400 translatable" data-id="{{ $product['category_id'] ?? 'Menu' }}" data-en="{{ $product['category_en'] ?? 'Menu' }}">
            {{ $product['category_id'] ?? 'Menu' }}
        </div>
    </a>
    <div class="p-4">
        <h3 class="text-sm font-bold text-gray-900 dark:text-white mt-1 leading-snug line-clamp-2 translatable" data-id="{{ $product['name_id'] }}" data-en="{{ $product['name_en'] }}">{{ $product['name_id'] }}</h3>
        <div class="flex justify-between items-center mt-3">
            <p class="text-lg font-extrabold text-amber-500 dark:text-amber-400">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <button class="w-8 h-8 rounded-full bg-amber-100 dark:bg-amber-900/40 text-amber-600 dark:text-amber-400 flex items-center justify-center hover:bg-amber-500 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </button>
        </div>
    </div>
</div>