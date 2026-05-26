@extends('layouts.app')

@section('title', 'Pembayaran - FoodLumina')

@section('content')
<div class="py-6 max-w-7xl mx-auto">
    <div class="flex items-center gap-3 mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white translatable" data-id="Pembayaran" data-en="Payment">Pembayaran</h1>
        <span class="bg-amber-500/10 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400 py-1 px-3 rounded-full text-sm font-bold translatable" data-id="Pilih Metode" data-en="Select Method">
            Pilih Metode
        </span>
    </div>

    {{-- Progress Steps Simplified --}}
    <div class="flex items-center justify-center mb-12">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2 opacity-50">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center text-xs font-bold">1</div>
                <span class="text-xs font-bold text-amber-600 hidden sm:block translatable" data-id="Pengiriman" data-en="Delivery">Pengiriman</span>
            </div>
            <div class="w-12 h-px bg-amber-200"></div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full bg-amber-500 text-white flex items-center justify-center text-xs font-bold ring-4 ring-amber-100/50">2</div>
                <span class="text-xs font-bold text-gray-900 dark:text-white translatable" data-id="Pembayaran" data-en="Payment">Pembayaran</span>
            </div>
            <div class="w-12 h-px bg-gray-200 dark:bg-gray-700"></div>
            <div class="flex items-center gap-2 opacity-50">
                <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-500 flex items-center justify-center text-xs font-bold">3</div>
                <span class="text-xs font-bold text-gray-400 hidden sm:block translatable" data-id="Selesai" data-en="Done">Selesai</span>
            </div>
        </div>
    </div>

    <form action="{{ route('checkout.pay', $order->invoice_number) }}" method="POST" id="payment-form">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- KIRI: Metode Pembayaran --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6 translatable" data-id="Pilih Metode Pembayaran" data-en="Select Payment Method">Pilih Metode Pembayaran</h2>
                    
                    <div class="space-y-4">
                        <label class="block cursor-pointer group">
                            <input type="radio" name="payment_method" value="va" class="peer hidden" checked>
                            <div class="p-6 border border-gray-200/50 dark:border-gray-700/50 bg-white/50 dark:bg-gray-900/50 rounded-2xl peer-checked:border-amber-500 peer-checked:bg-amber-50/50 dark:peer-checked:bg-amber-500/10 transition-all flex items-center gap-4 hover:border-amber-200">
                                <div class="w-12 h-12 bg-gray-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-amber-500 shadow-inner">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900 dark:text-white">Virtual Account</h3>
                                    <p class="text-xs text-gray-500 font-medium translatable" data-id="Transfer via BCA, Mandiri, atau BNI" data-en="Transfer via BCA, Mandiri, or BNI">Transfer via BCA, Mandiri, atau BNI</p>
                                </div>
                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center peer-checked:border-amber-500">
                                    <div class="w-2.5 h-2.5 bg-amber-500 rounded-full scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </div>
                        </label>

                        <label class="block cursor-pointer group">
                            <input type="radio" id="radio-qris" name="payment_method" value="qris" class="peer hidden">
                            <div class="p-6 border border-gray-200/50 dark:border-gray-700/50 bg-white/50 dark:bg-gray-900/50 rounded-2xl peer-checked:border-amber-500 peer-checked:bg-amber-50/50 dark:peer-checked:bg-amber-500/10 transition-all flex items-center gap-4 hover:border-amber-200">
                                <div class="w-12 h-12 bg-gray-50 dark:bg-gray-800 rounded-xl flex items-center justify-center text-amber-500 shadow-inner">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h2M4 8h12m-12 4h12m-12 4h12M4 20h4"/></svg>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-900 dark:text-white">QRIS / E-Wallet</h3>
                                    <p class="text-xs text-gray-500 font-medium translatable" data-id="Gopay, OVO, Dana (Verifikasi Otomatis)" data-en="Gopay, OVO, Dana (Auto Verification)">Gopay, OVO, Dana (Verifikasi Otomatis)</p>
                                </div>
                                <div class="w-5 h-5 border-2 border-gray-300 rounded-full flex items-center justify-center peer-checked:border-amber-500">
                                    <div class="w-2.5 h-2.5 bg-amber-500 rounded-full scale-0 peer-checked:scale-100 transition-transform"></div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="bg-amber-50/80 dark:bg-amber-900/20 border border-amber-100/50 dark:border-amber-800/50 rounded-3xl p-6 flex gap-4 backdrop-blur-sm">
                    <svg class="w-6 h-6 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <p class="text-xs text-amber-800 dark:text-amber-400 leading-relaxed font-bold italic translatable" data-id="Simulasi: Pilih QRIS untuk melihat proses konfirmasi pembayaran otomatis (5 detik) seolah asli." data-en="Simulation: Select QRIS to see the automatic payment confirmation process (5 seconds) as if it were real.">Simulasi: Pilih QRIS untuk melihat proses konfirmasi pembayaran otomatis (5 detik) seolah asli.</p>
                </div>
            </div>

            {{-- KANAN: Sidebar --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- Payment Details --}}
                <div class="backdrop-blur-xl bg-white/70 dark:bg-gray-800/60 rounded-3xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl sticky top-24">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-6 translatable" data-id="Ringkasan Pembayaran" data-en="Payment Summary">Ringkasan Pembayaran</h2>
                    
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500 translatable" data-id="No. Pesanan" data-en="Order No.">No. Pesanan</span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $order->invoice_number }}</span>
                        </div>
                        <div class="w-full h-px bg-gray-200/50 dark:bg-gray-700/50"></div>
                        <div class="flex justify-between items-end">
                            <span class="text-sm font-bold text-gray-900 dark:text-white translatable" data-id="Total Bayar" data-en="Total Pay">Total Bayar</span>
                            <span class="text-2xl font-black text-amber-500">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="w-full flex justify-center items-center py-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white font-bold rounded-full transition-all shadow-lg shadow-amber-500/25 gap-2">
                        <span class="translatable" data-id="KONFIRMASI BAYAR" data-en="CONFIRM PAYMENT">KONFIRMASI BAYAR</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    
                    <a href="{{ route('home') }}" class="w-full flex justify-center items-center py-3 mt-4 text-gray-400 hover:text-gray-600 dark:hover:text-white text-xs font-bold transition-colors translatable" data-id="Batal Dulu" data-en="Cancel">
                        Batal Dulu
                    </a>
                </div>

                {{-- Countdown Timer --}}
                <div class="bg-gray-900/80 backdrop-blur-xl rounded-3xl p-6 text-center shadow-xl border border-white/10">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 translatable" data-id="Bayar Sebelum" data-en="Pay Before">Bayar Sebelum</p>
                    <div class="flex items-center justify-center gap-2">
                        <div class="bg-white/10 rounded-xl px-3 py-2 text-white font-bold text-lg">23:59:</div>
                        <div class="bg-amber-500 rounded-xl px-3 py-2 text-white font-bold text-lg shadow-inner" id="timer-sec">59</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

{{-- Overlay Simulasi QRIS --}}
<div id="qris-overlay" class="fixed inset-0 bg-gray-900/90 backdrop-blur-md z-[100] hidden flex items-center justify-center p-6">
    <div class="max-w-sm w-full bg-white dark:bg-gray-800 rounded-[2.5rem] p-10 text-center shadow-2xl border border-gray-200 dark:border-gray-700">
        <div class="w-48 h-48 bg-gray-50 dark:bg-gray-900 rounded-3xl mx-auto mb-8 flex items-center justify-center border-4 border-amber-500/20 relative overflow-hidden">
            {{-- Dummy QR CSS --}}
            <div class="grid grid-cols-4 gap-1 p-2 opacity-30">
                @for($i=0; $i<16; $i++) <div class="w-8 h-8 bg-black dark:bg-white rounded-sm"></div> @endfor
            </div>
            <div class="absolute inset-0 flex items-center justify-center">
                <svg class="w-20 h-20 text-amber-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h2M4 8h12m-12 4h12m-12 4h12M4 20h4"/></svg>
            </div>
        </div>
        <h2 class="text-2xl font-black text-gray-900 dark:text-white mb-2 underline decoration-amber-500 decoration-4">Scan QRIS...</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mb-8 leading-relaxed font-medium">
            <span class="translatable" data-id="Pembayaran akan dikonfirmasi otomatis dalam" data-en="Payment will be confirmed automatically in">Pembayaran akan dikonfirmasi otomatis dalam</span> 
            <span id="qris-timer" class="text-amber-500 font-black text-lg">5</span> 
            <span class="translatable" data-id="detik." data-en="seconds.">detik.</span>
        </p>
        <div class="flex gap-2">
            <div class="flex-1 h-1.5 bg-gray-100 dark:bg-gray-700 rounded-full overflow-hidden">
                <div id="qris-progress" class="bg-amber-500 h-full w-0 transition-all duration-[5000ms] ease-linear"></div>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Sidebar Timer
    let sec = 59;
    setInterval(() => {
        sec = sec <= 0 ? 59 : sec - 1;
        document.getElementById('timer-sec').innerText = sec.toString().padStart(2, '0');
    }, 1000);

    // 2. QRIS Simulation
    const radioQris = document.getElementById('radio-qris');
    const qrisOverlay = document.getElementById('qris-overlay');
    const qrisTimerText = document.getElementById('qris-timer');
    const qrisProgress = document.getElementById('qris-progress');
    const paymentForm = document.getElementById('payment-form');

    radioQris.addEventListener('change', function() {
        if (this.checked) {
            qrisOverlay.classList.remove('hidden');
            setTimeout(() => qrisProgress.style.width = '100%', 50);
            
            let count = 5;
            const interval = setInterval(() => {
                count--;
                qrisTimerText.innerText = count;
                if (count <= 0) {
                    clearInterval(interval);
                    paymentForm.submit();
                }
            }, 1000);
        }
    });
</script>
@endsection