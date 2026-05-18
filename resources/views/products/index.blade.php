@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<div class="space-y-6">
    <div class="pb-4 border-b border-gray-200/50 dark:border-gray-700/50">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white translatable" data-id="Katalog Menu FoodLumina" data-en="FoodLumina Menu Catalog">Katalog Menu FoodLumina</h1>
        <p class="text-sm text-gray-400 mt-1 translatable" data-id="Temukan berbagai hidangan premium dari seluruh dunia untuk memanjakan lidah Anda." data-en="Find various premium dishes from around the world to pamper your taste buds.">Temukan berbagai hidangan premium dari seluruh dunia untuk memanjakan lidah Anda.</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @forelse($products as $item)
            @include('components.product-card', ['product' => $item])
        @empty
            <div class="col-span-full py-16 text-center text-gray-400">
                <p class="translatable" data-id="Produk belum tersedia." data-en="Products are not available yet.">Produk belum tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection