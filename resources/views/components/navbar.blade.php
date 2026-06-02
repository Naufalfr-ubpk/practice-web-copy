<nav class="sticky top-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-gray-900/80 border-b border-gray-200/50 dark:border-gray-700/50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <div class="p-1.5 bg-amber-500 rounded-lg shadow-sm">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="font-black text-xl tracking-tight text-gray-900 dark:text-white">Food<span class="text-amber-500">Lumina</span></span>
            </a>
            
            {{-- Center Menu --}}
            <div class="hidden md:flex items-center space-x-8">
                @if(request()->is('admin*'))
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'text-amber-500 underline underline-offset-4 decoration-2' : 'text-gray-600 dark:text-gray-300 hover:text-amber-500' }} text-sm font-bold transition-colors translatable" data-id="Admin Dashboard" data-en="Admin Dashboard">Admin Dashboard</a>
                    <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'text-amber-500 underline underline-offset-4 decoration-2' : 'text-gray-600 dark:text-gray-300 hover:text-amber-500' }} text-sm font-bold transition-colors translatable" data-id="Kelola Pesanan" data-en="Manage Orders">Kelola Pesanan</a>
                    <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'text-amber-500 underline underline-offset-4 decoration-2' : 'text-gray-600 dark:text-gray-300 hover:text-amber-500' }} text-sm font-bold transition-colors translatable" data-id="Kelola Stok Menu" data-en="Manage Stock">Kelola Stok Menu</a>
                @else
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-amber-500 underline underline-offset-4 decoration-2' : 'text-gray-600 dark:text-gray-300 hover:text-amber-500' }} text-sm font-bold transition-colors translatable" data-id="Beranda" data-en="Home">Beranda</a>
                    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'text-amber-500 underline underline-offset-4 decoration-2' : 'text-gray-600 dark:text-gray-300 hover:text-amber-500' }} text-sm font-semibold transition-colors translatable" data-id="Menu" data-en="Menu">Menu</a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 text-sm font-semibold hover:text-amber-500 transition-colors translatable" data-id="Reservasi" data-en="Reservation">Reservasi</a>
                    <a href="#" class="text-gray-600 dark:text-gray-300 text-sm font-semibold hover:text-amber-500 transition-colors translatable" data-id="Kontak" data-en="Contact">Kontak</a>
                @endif
            </div>

            <div class="flex items-center space-x-4">
                {{-- Language Switcher --}}
                <div class="relative" id="langDropdown">
                    <button onclick="toggleLangMenu()" class="flex items-center gap-1 text-xs font-bold text-gray-600 dark:text-gray-300 hover:text-amber-500 transition-colors px-2 py-1 rounded-md">
                        <span id="currentLang">ID</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="langMenu" class="hidden absolute right-0 mt-2 w-28 backdrop-blur-xl bg-white/90 dark:bg-gray-800/90 border border-gray-100 dark:border-gray-700 rounded-xl shadow-xl overflow-hidden z-50">
                        <button onclick="setLang('ID')" class="w-full text-left px-4 py-2.5 text-xs font-bold text-gray-700 dark:text-gray-200 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition-colors">🇮🇩 Indonesia</button>
                        <button onclick="setLang('EN')" class="w-full text-left px-4 py-2.5 text-xs font-bold text-gray-700 dark:text-gray-200 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition-colors">🇺🇸 English</button>
                    </div>
                </div>

                {{-- Dark Mode --}}
                <button onclick="toggleDarkMode()" id="themeToggle" class="w-9 h-9 flex items-center justify-center rounded-full text-gray-500 dark:text-amber-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg id="iconSun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg id="iconMoon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>

               {{-- Cart --}}
                @if(!request()->is('admin*'))
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-gray-500 dark:text-gray-400 hover:text-amber-500 dark:hover:text-amber-400 transition-colors">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        
                        {{-- Badge Notifikasi Cart --}}
                        @auth
                            @php
                                $cartCount = \App\Models\CartItem::whereHas('cart', function($q) {
                                    $q->where('user_id', \Illuminate\Support\Facades\Auth::id());
                                })->sum('quantity');
                            @endphp

                            @if($cartCount > 0)
                                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-4 h-4 text-[9px] font-bold text-white bg-red-500 rounded-full border border-white dark:border-gray-900 transform translate-x-1/2 -translate-y-1/2">
                                    {{ $cartCount > 99 ? '99+' : $cartCount }}
                                </span>
                            @endif
                        @endauth
                    </a>
                @endif

                {{-- AUTH SECTION --}}
                @auth
                    <div class="relative" id="userDropdown">
                        <button onclick="toggleUserMenu()" class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-full border border-gray-200 dark:border-gray-700 hover:border-amber-500 dark:hover:border-amber-500 transition-colors">
                            <div class="w-7 h-7 rounded-full bg-amber-500 flex items-center justify-center text-white font-bold text-xs">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ explode(' ', Auth::user()->name)[0] }}</span>
                        </button>
                        <div id="userMenu" class="hidden absolute right-0 mt-3 w-48 backdrop-blur-xl bg-white/90 dark:bg-gray-800/90 border border-gray-100 dark:border-gray-700 rounded-2xl shadow-xl overflow-hidden z-50">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition-colors translatable" data-id="Profil Saya" data-en="My Profile">Profil Saya</a>
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm font-semibold text-gray-700 dark:text-gray-200 hover:text-amber-500 hover:bg-amber-50 dark:hover:bg-amber-900/30 transition-colors">Admin Dashboard</a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-3 text-sm font-semibold text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors translatable" data-id="Keluar" data-en="Logout">Keluar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="hidden md:inline-flex items-center px-6 py-2 rounded-full text-sm font-bold text-white bg-amber-500 hover:bg-amber-600 shadow-md transition-colors translatable" data-id="Masuk" data-en="Login">Masuk</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDarkMode() { document.documentElement.classList.toggle('dark'); const isDark = document.documentElement.classList.contains('dark'); localStorage.setItem('theme', isDark ? 'dark' : 'light'); updateThemeIcon(); }
    function updateThemeIcon() { const isDark = document.documentElement.classList.contains('dark'); document.getElementById('iconSun').classList.toggle('hidden', !isDark); document.getElementById('iconMoon').classList.toggle('hidden', isDark); }
    updateThemeIcon();

    function applyTranslation(lang) {
        document.querySelectorAll('.translatable').forEach(el => {
            if (lang === 'EN' && el.getAttribute('data-en')) el.innerHTML = el.getAttribute('data-en');
            else if (lang === 'ID' && el.getAttribute('data-id')) el.innerHTML = el.getAttribute('data-id');
        });
    }

    function toggleLangMenu() { document.getElementById('langMenu').classList.toggle('hidden'); }
    function setLang(lang) { document.getElementById('currentLang').textContent = lang; document.getElementById('langMenu').classList.add('hidden'); localStorage.setItem('lang', lang); applyTranslation(lang); }
    
    document.addEventListener('DOMContentLoaded', () => { const savedLang = localStorage.getItem('lang') || 'ID'; document.getElementById('currentLang').textContent = savedLang; applyTranslation(savedLang); });

    function toggleUserMenu() { const menu = document.getElementById('userMenu'); if (menu) menu.classList.toggle('hidden'); }
    document.addEventListener('click', function(e) {
        if (document.getElementById('langDropdown') && !document.getElementById('langDropdown').contains(e.target)) { const lMenu = document.getElementById('langMenu'); if(lMenu) lMenu.classList.add('hidden'); }
        if (document.getElementById('userDropdown') && !document.getElementById('userDropdown').contains(e.target)) { const m = document.getElementById('userMenu'); if(m) m.classList.add('hidden'); }
    });
</script>