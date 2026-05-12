<nav class="bg-white dark:bg-gray-800 sticky top-0 z-50 border-b border-gray-100 dark:border-gray-700 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <svg class="h-6 w-6 text-gray-800 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="font-bold text-xl text-gray-900 dark:text-white">TechStore</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-teal-500 text-sm font-medium underline underline-offset-4 decoration-2 translatable" data-id="Beranda" data-en="Home">Beranda</a>
                <a href="{{ route('products.index') }}" class="text-gray-600 dark:text-gray-300 text-sm font-medium hover:text-teal-500 transition-colors translatable" data-id="Produk" data-en="Products">Produk</a>
                <a href="#" class="text-gray-600 dark:text-gray-300 text-sm font-medium hover:text-teal-500 transition-colors translatable" data-id="Kategori" data-en="Categories">Kategori</a>
                <a href="#" class="text-gray-600 dark:text-gray-300 text-sm font-medium hover:text-teal-500 transition-colors translatable" data-id="Tentang" data-en="About Us">Tentang</a>
                <a href="#" class="text-gray-600 dark:text-gray-300 text-sm font-medium hover:text-teal-500 transition-colors translatable" data-id="Kontak" data-en="Contact">Kontak</a>
            </div>

            <div class="flex items-center space-x-4">
                {{-- Language Switcher --}}
                <div class="relative" id="langDropdown">
                    <button onclick="toggleLangMenu()" class="flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-300 hover:text-teal-500 transition-colors px-2 py-1 rounded-md border border-gray-200 dark:border-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        <span id="currentLang">ID</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div id="langMenu" class="hidden absolute right-0 mt-1 w-28 bg-white dark:bg-gray-700 border border-gray-100 dark:border-gray-600 rounded-lg shadow-lg overflow-hidden z-50">
                        <button onclick="setLang('ID')" class="w-full text-left px-3 py-2 text-xs font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">🇮🇩 Indonesia</button>
                        <button onclick="setLang('EN')" class="w-full text-left px-3 py-2 text-xs font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">🇺🇸 English</button>
                    </div>
                </div>

                {{-- Dark Mode Toggle --}}
                <button onclick="toggleDarkMode()" id="themeToggle" class="w-9 h-9 flex items-center justify-center rounded-full border border-gray-200 dark:border-gray-600 text-gray-500 dark:text-yellow-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors" title="Ubah Tema">
                    <svg id="iconSun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <svg id="iconMoon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                </button>

                {{-- Search --}}
                <button class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>

                {{-- Cart --}}
                <a href="{{ route('cart.index') }}" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </a>

                {{-- ===== AUTH-AWARE SECTION ===== --}}
                @auth
                    {{-- Jika sudah login: tampilkan nama user + dropdown --}}
                    <div class="relative" id="userDropdown">
                        <button onclick="toggleUserMenu()" class="hidden md:flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-teal-500 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-200 max-w-[100px] truncate">{{ Auth::user()->name }}</span>
                            <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div id="userMenu" class="hidden absolute right-0 mt-1 w-48 bg-white dark:bg-gray-700 border border-gray-100 dark:border-gray-600 rounded-xl shadow-lg overflow-hidden z-50">
                            <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-600">
                                <p class="text-sm font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors translatable" data-id="Profil Saya" data-en="My Profile">
                                <span class="inline-flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Profil Saya
                                </span>
                            </a>
                            @if(Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors translatable" data-id="Admin Dashboard" data-en="Admin Dashboard">
                                    <span class="inline-flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                        Admin Dashboard
                                    </span>
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors translatable" data-id="Keluar" data-en="Logout">
                                    <span class="inline-flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Keluar
                                    </span>
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Jika belum login: tampilkan tombol Masuk --}}
                    <a href="{{ route('login') }}" class="hidden md:inline-flex items-center gap-2 px-5 py-2 rounded-md text-sm font-semibold text-white bg-teal-500 hover:bg-teal-600 transition-colors translatable" data-id="Masuk" data-en="Login">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Masuk
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script>
    // ===== DARK MODE =====
    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');
        const isDark = document.documentElement.classList.contains('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        updateThemeIcon();
    }
    function updateThemeIcon() {
        const isDark = document.documentElement.classList.contains('dark');
        document.getElementById('iconSun').classList.toggle('hidden', !isDark);
        document.getElementById('iconMoon').classList.toggle('hidden', isDark);
    }
    updateThemeIcon();

    // ===== TRANSLATION LOGIC =====
    function applyTranslation(lang) {
        const elements = document.querySelectorAll('.translatable');
        elements.forEach(el => {
            if (lang === 'EN' && el.getAttribute('data-en')) {
                el.innerHTML = el.getAttribute('data-en');
            } else if (lang === 'ID' && el.getAttribute('data-id')) {
                el.innerHTML = el.getAttribute('data-id');
            }
        });
    }

    // ===== LANGUAGE SWITCHER =====
    function toggleLangMenu() { document.getElementById('langMenu').classList.toggle('hidden'); }
    function setLang(lang) {
        document.getElementById('currentLang').textContent = lang;
        document.getElementById('langMenu').classList.add('hidden');
        localStorage.setItem('lang', lang);
        applyTranslation(lang);
    }
    
    // Init Lang & Translation on Load
    document.addEventListener('DOMContentLoaded', () => {
        const savedLang = localStorage.getItem('lang') || 'ID';
        document.getElementById('currentLang').textContent = savedLang;
        applyTranslation(savedLang);
    });

    // ===== USER DROPDOWN =====
    function toggleUserMenu() {
        const menu = document.getElementById('userMenu');
        if (menu) menu.classList.toggle('hidden');
    }

    // Close all dropdowns on outside click
    document.addEventListener('click', function(e) {
        const langDropdown = document.getElementById('langDropdown');
        const userDropdown = document.getElementById('userDropdown');
        if (langDropdown && !langDropdown.contains(e.target)) {
            const lMenu = document.getElementById('langMenu');
            if(lMenu) lMenu.classList.add('hidden');
        }
        if (userDropdown && !userDropdown.contains(e.target)) { 
            const m = document.getElementById('userMenu'); 
            if(m) m.classList.add('hidden'); 
        }
    });
</script>