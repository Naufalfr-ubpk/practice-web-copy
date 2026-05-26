@extends('layouts.app')

@section('title', 'Pesanan Berhasil')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-20 text-center">
    <div class="mb-8 flex justify-center">
        <div class="w-24 h-24 bg-green-500/10 dark:bg-green-500/20 text-green-500 rounded-full flex items-center justify-center shadow-lg shadow-green-500/20">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
        </div>
    </div>

    <h1 class="text-4xl font-black text-gray-900 dark:text-white mb-4 translatable" data-id="Terima Kasih!" data-en="Thank You!">Terima Kasih!</h1>
    <p class="text-gray-600 dark:text-gray-400 text-lg mb-10 max-w-sm mx-auto translatable" data-id="Pesanan Anda telah berhasil dibayar dan sedang kami proses. Silakan tunggu update selanjutnya." data-en="Your order has been successfully paid and is being processed. Please wait for further updates.">
        Pesanan Anda telah berhasil dibayar dan sedang kami proses. Silakan tunggu update selanjutnya.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <a href="{{ route('home') }}" class="px-8 py-4 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-full transition-all shadow-lg shadow-amber-500/25 translatable" data-id="Kembali ke Beranda" data-en="Back to Home">
            Kembali ke Beranda
        </a>
        <a href="#" class="px-8 py-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white font-bold rounded-full hover:bg-gray-50 dark:hover:bg-gray-700 transition-all translatable" data-id="Lihat Detail Pesanan" data-en="View Order Details">
            Lihat Detail Pesanan
        </a>
    </div>

    <p class="mt-8 text-sm text-gray-400 italic">
        "Detail pesanan dapat dilihat di dashboard user pada praktikum selanjutnya."
    </p>
</div>
@endsection