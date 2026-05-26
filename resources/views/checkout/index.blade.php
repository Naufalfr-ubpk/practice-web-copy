@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
<div class="py-6 max-w-7xl mx-auto">
    <div class="flex items-center gap-3 mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white translatable" data-id="Pemesanan" data-en="Checkout">Pemesanan</h1>
        <span class="bg-amber-500/10 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400 py-1 px-3 rounded-full text-sm font-bold translatable" data-id="Informasi Pengiriman" data-en="Delivery Info">
            Informasi Pengiriman
        </span>
    </div>

    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- KIRI: Form Pengiriman --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 bg-amber-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-amber-500/20">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white translatable" data-id="Alamat Pengiriman" data-en="Delivery Address">Alamat Pengiriman</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="text-sm font-bold text-gray-700 dark:text-gray-300 translatable" data-id="Nama Penerima" data-en="Recipient Name">Nama Penerima</label>
                            <input type="text" value="{{ Auth::user()->name }}" disabled 
                                class="w-full px-5 py-3.5 rounded-xl border border-gray-200/50 dark:border-gray-700/50 bg-gray-50/50 dark:bg-gray-900/50 text-gray-400 font-bold focus:ring-0 cursor-not-allowed">
                        </div>
                        <div class="space-y-2">
                            <label for="phone" class="text-sm font-bold text-gray-700 dark:text-gray-300 translatable" data-id="Nomor Telepon / WA" data-en="Phone / WhatsApp">Nomor Telepon / WA</label>
                            <input type="text" name="phone" id="phone" required placeholder="08123456789" 
                                class="w-full px-5 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-900/50 text-gray-900 dark:text-white font-bold focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="address" class="text-sm font-bold text-gray-700 dark:text-gray-300 translatable" data-id="Alamat Lengkap" data-en="Full Address">Alamat Lengkap</label>
                        <textarea name="address" id="address" rows="3" required placeholder="Jl. Nama Jalan, No. Rumah..." 
                            class="w-full px-5 py-3.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white/50 dark:bg-gray-900/50 text-gray-900 dark:text-white font-bold focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none resize-none"></textarea>
                    </div>
                </div>

                {{-- Daftar Sajian --}}
                <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 translatable" data-id="Sajian yang Dipesan" data-en="Ordered Dishes">Sajian yang Dipesan</h3>
                    <div class="space-y-4">
                        @foreach($cart->items as $item)
                            <div class="flex items-center gap-4 py-4 border-b border-gray-100 dark:border-gray-700 last:border-0">
                                <div class="w-16 h-16 bg-gray-50 dark:bg-gray-900 rounded-xl overflow-hidden shrink-0 shadow-inner">
                                    <img src="{{ $item->product->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-bold text-gray-900 dark:text-white truncate">{{ $item->product->name }}</h4>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 font-bold">
                                        {{ $item->quantity }} <span class="translatable" data-id="porsi" data-en="portion">porsi</span> x <span class="text-amber-500">Rp {{ number_format($item->product->price, 0, ',', '.') }}</span>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- KANAN: Sidebar Summary --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl sticky top-24">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6 translatable" data-id="Ringkasan Pesanan" data-en="Order Summary">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-4 mb-6 text-sm">
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span><span class="translatable" data-id="Total Harga" data-en="Total Price">Total Harga</span> ({{ $cart->items->count() }} <span class="translatable" data-id="sajian" data-en="items">sajian</span>)</span>
                            <span class="font-medium text-gray-900 dark:text-white font-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600 dark:text-gray-400">
                            <span class="translatable" data-id="Biaya Pengiriman" data-en="Delivery Fee">Biaya Pengiriman</span>
                            <span class="font-bold text-green-500 translatable" data-id="GRATIS" data-en="FREE">GRATIS</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-200/50 dark:border-gray-700/50 pt-6 mb-8">
                        <div class="flex justify-between items-end">
                            <span class="text-base font-bold text-gray-900 dark:text-white translatable" data-id="Total Tagihan" data-en="Total Bill">Total Tagihan</span>
                            <span class="text-2xl font-black text-amber-500">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="w-full flex justify-center items-center py-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white font-bold rounded-full transition-all shadow-lg shadow-amber-500/25 gap-2">
                        <span class="translatable" data-id="PESAN SEKARANG" data-en="ORDER NOW">PESAN SEKARANG</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    
                    <div class="mt-8 flex items-start gap-3 p-4 bg-amber-50/50 dark:bg-amber-500/5 rounded-xl border border-amber-100/50 dark:border-amber-500/10">
                        <svg class="w-5 h-5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        <p class="text-[11px] text-gray-500 dark:text-gray-400 leading-tight font-medium translatable" data-id="Transaksi aman. Data pribadi Anda dijamin kerahasiaannya oleh enkripsi SSL." data-en="Secure transaction. Your personal data is guaranteed confidentiality by SSL encryption.">Transaksi aman. Data pribadi Anda dijamin kerahasiaannya oleh enkripsi SSL.</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection