@extends('layouts.app')

@section('title', 'Semua Produk')

@section('content')
<div class="space-y-6">
    <div class="pb-4 border-b border-gray-100">
        <h1 class="text-2xl font-bold text-gray-900 translatable" data-id="Katalog Produk Komputer" data-en="Computer Product Catalog">Katalog Produk Komputer</h1>
        <p class="text-sm text-gray-400 mt-1 translatable" data-id="Temukan segala komponen PC, Laptop gaming, hingga aksesoris mekanikal impianmu." data-en="Find all PC components, gaming laptops, and your dream mechanical accessories.">Temukan segala komponen PC, Laptop gaming, hingga aksesoris mekanikal impianmu.</p>
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