<x-guest-layout>
    @section('title', 'Daftar Akun')

    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 translatable" data-id="Buat Akun Baru ✨" data-en="Create New Account ✨">Buat Akun Baru ✨</h2>
    <p class="text-sm text-gray-400 mb-8 translatable" data-id="Bergabung dan nikmati kemudahan belanja di TechStore." data-en="Join us and enjoy the convenience of shopping at TechStore.">Bergabung dan nikmati kemudahan belanja di TechStore.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-5">
            <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 translatable" data-id="Nama Lengkap" data-en="Full Name">Nama Lengkap</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7 7z"/></svg>
                </span>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
            </div>
            @error('name') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Email --}}
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="nama@email.com" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
            </div>
            @error('email') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Password --}}
        <div class="mb-5">
            <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 translatable" data-id="Password" data-en="Password">Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </span>
                <input id="password" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
            </div>
            @error('password') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 translatable" data-id="Konfirmasi Password" data-en="Confirm Password">Konfirmasi Password</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </span>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-teal-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
            </div>
        </div>

        {{-- Submit --}}
        <button type="submit" class="w-full py-3 px-4 bg-teal-500 hover:bg-teal-600 active:bg-teal-700 text-white font-bold rounded-xl text-sm transition-all duration-200 shadow-lg shadow-teal-500/25 hover:shadow-teal-500/40 translatable" data-id="Daftar Sekarang" data-en="Register Now">
            Daftar Sekarang
        </button>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">
            <span class="translatable" data-id="Sudah punya akun?" data-en="Already have an account?">Sudah punya akun?</span>  
            <a href="{{ route('login') }}" class="text-teal-500 hover:text-teal-600 font-semibold transition-colors translatable" data-id="Masuk di sini" data-en="Login here">Masuk di sini</a>
        </p>
    </form>
</x-guest-layout>