@extends('layouts.app')
@section('title', 'Kelola Stok Menu')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white translatable" data-id="Kelola Stok Menu" data-en="Manage Menu Stock">Kelola Stok Menu</h2>
            <p class="text-sm text-gray-500 mt-1 translatable" data-id="Daftar semua menu kuliner FoodLumina beserta informasi kuantitas stok saat ini." data-en="List of all FoodLumina culinary menus along with current stock quantities.">Daftar semua menu kuliner FoodLumina beserta informasi kuantitas stok saat ini.</p>
        </div>
        <button class="bg-amber-500 text-white px-4 py-2.5 rounded-xl text-sm font-bold transition shadow-md opacity-50 cursor-not-allowed flex items-center gap-2" disabled title="Fitur Tambah Menu akan dibangun pada praktikum berikutnya">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            <span class="translatable" data-id="Tambah Menu" data-en="Add Menu">Tambah Menu</span>
        </button>
    </div>

    <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 shadow-lg rounded-3xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-500 dark:text-gray-400 uppercase text-xs font-bold tracking-wider">
                        <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Hidangan" data-en="Dish">Hidangan</th>
                        <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 translatable" data-id="Harga" data-en="Price">Harga</th>
                        <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 text-center translatable" data-id="Status Stok" data-en="Stock Status">Status Stok</th>
                        <th class="py-4 px-6 border-b border-gray-100 dark:border-gray-700 text-center translatable" data-id="Aksi" data-en="Action">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 dark:text-gray-300 text-sm">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/30 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-xl object-cover shadow-sm">
                                    @else
                                        <div class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                    @endif
                                    <span class="font-bold text-gray-900 dark:text-white">{{ $product->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6 font-bold text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 text-xs font-bold rounded-full {{ $product->stock > 5 ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                    {{ $product->stock }} <span class="translatable" data-id="porsi" data-en="portions">porsi</span>
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <button class="text-amber-500 hover:text-amber-700 dark:text-amber-400 font-bold text-sm opacity-50 cursor-not-allowed" title="Fitur edit stok dapur akan dibangun pada praktikum berikutnya" disabled>
                                    <span class="translatable" data-id="Edit Stok" data-en="Edit Stock">Edit Stok</span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-gray-500 translatable" data-id="Belum ada menu terdaftar saat ini." data-en="No menu registered at this time.">Belum ada menu terdaftar saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100 dark:border-gray-700">
            {{ $products->links() }}
        </div>
    </div>
@endsection