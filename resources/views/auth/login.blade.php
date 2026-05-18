<x-guest-layout>
    @section('title', 'Masuk')

    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 translatable" data-id="Selamat Datang 👋" data-en="Welcome Back 👋">Selamat Datang 👋</h2>
    <p class="text-sm text-gray-400 mb-8 translatable" data-id="Masuk ke akun FoodLumina kamu untuk mulai memesan." data-en="Log in to your FoodLumina account to start ordering.">Masuk ke akun FoodLumina kamu untuk mulai memesan.</p>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600 bg-green-50 dark:bg-green-900/20 rounded-lg px-4 py-2.5">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-5">
            <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="nama@email.com" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
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
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 text-gray-900 dark:text-white text-sm focus:ring-2 focus:ring-amber-500 focus:border-transparent outline-none transition placeholder:text-gray-300 dark:placeholder:text-gray-500">
            </div>
            @error('password') <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p> @enderror
        </div>

        {{-- Remember & Forgot --}}
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-amber-500 focus:ring-amber-500 transition">
                <span class="ms-2 text-sm text-gray-500 dark:text-gray-400 translatable" data-id="Ingat saya" data-en="Remember me">Ingat saya</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-amber-500 hover:text-amber-600 font-medium transition-colors translatable" data-id="Lupa password?" data-en="Forgot password?">Lupa password?</a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit" class="w-full py-3 px-4 bg-amber-500 hover:bg-amber-600 active:bg-amber-700 text-white font-bold rounded-xl text-sm transition-all duration-200 shadow-lg shadow-amber-500/25 hover:shadow-amber-500/40 translatable" data-id="Masuk" data-en="Login">
            Masuk
        </button>

        {{-- Divider --}}
        <div class="flex items-center my-6">
            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
            <span class="px-4 text-xs text-gray-400 translatable" data-id="atau" data-en="or">atau</span>
            <div class="flex-1 h-px bg-gray-200 dark:bg-gray-700"></div>
        </div>

        {{-- Google Button (visual only) --}}
        <button type="button" disabled class="w-full flex items-center justify-center gap-3 py-3 px-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-xl text-sm font-medium text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors opacity-50 cursor-not-allowed">
            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29 1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
            <span class="translatable" data-id="Masuk dengan Google (Segera Hadir)" data-en="Login with Google (Coming Soon)">Masuk dengan Google (Segera Hadir)</span>
        </button>

        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">
            <span class="translatable" data-id="Belum punya akun?" data-en="Don't have an account?">Belum punya akun?</span>  
            <a href="{{ route('register') }}" class="text-amber-500 hover:text-amber-600 font-semibold transition-colors translatable" data-id="Daftar sekarang" data-en="Register now">Daftar sekarang</a>
        </p>
    </form>
</x-guest-layout>