<div class="group bg-white dark:bg-gray-800 rounded-xl overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-md transition-all duration-300">
    <a href="#" class="block aspect-[4/3] overflow-hidden bg-gray-50 dark:bg-gray-700">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
    </a>
    <div class="p-4">
        <p class="text-[10px] font-semibold text-gray-400 uppercase tracking-wider">{{ $product['category'] ?? 'Komponen' }}</p>
        <h3 class="text-sm font-bold text-gray-900 dark:text-white mt-1 leading-snug line-clamp-2">{{ $product['name'] }}</h3>
        <p class="text-base font-extrabold text-teal-500 dark:text-teal-400 mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
    </div>
</div>