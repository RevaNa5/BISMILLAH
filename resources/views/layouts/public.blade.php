<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-100 bg-pikr-background selection:bg-pikr-primary selection:text-white">
    <div x-data="{ isMobileMenuOpen: false }" class="min-h-screen flex flex-col relative overflow-x-hidden">
        
        <!-- Global Background Gradient & Glow -->
        <div class="fixed inset-0 z-0 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-emerald-900/20 blur-[120px]"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[60%] h-[60%] rounded-full bg-teal-900/20 blur-[150px]"></div>
        </div>

        <!-- Navbar -->
        <header class="sticky top-0 z-50 backdrop-blur-lg bg-pikr-background/80 border-b border-white/10 shadow-sm transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3 group">
                    <img src="/images/gnre lrvel.png" alt="GenRe Logo" class="h-9 w-auto max-w-[40px] object-contain transition-transform duration-300 group-hover:scale-105" onerror="this.src='/images/placeholder.png'" />
                    <img src="/images/smc lrvel.png" alt="SMC Logo" class="h-9 w-auto max-w-[40px] object-contain transition-transform duration-300 group-hover:scale-105" onerror="this.src='/images/placeholder.png'" />
                    <img src="/images/pik r, lrvel.png" alt="PIK-R Logo" class="h-9 w-auto max-w-[40px] object-contain transition-transform duration-300 group-hover:scale-105" onerror="this.src='/images/placeholder.png'" />
                    <div class="h-6 w-px bg-white/20 mx-1 hidden sm:block"></div>
                    <div class="font-extrabold text-xl text-white tracking-tight hidden sm:block drop-shadow-sm group-hover:text-pikr-primary transition-colors duration-300">
                        PIK-R SKAKMATT
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-sm uppercase tracking-wide font-bold transition-colors duration-200 {{ request()->is('/') ? 'text-pikr-accent border-b-2 border-pikr-accent py-1' : 'text-gray-300 hover:text-white' }}">Beranda</a>
                    <a href="/informasi" class="text-sm uppercase tracking-wide font-bold transition-colors duration-200 {{ request()->is('informasi*') ? 'text-pikr-accent border-b-2 border-pikr-accent py-1' : 'text-gray-300 hover:text-white' }}">Informasi</a>
                    <a href="/kegiatan" class="text-sm uppercase tracking-wide font-bold transition-colors duration-200 {{ request()->is('kegiatan*') ? 'text-pikr-accent border-b-2 border-pikr-accent py-1' : 'text-gray-300 hover:text-white' }}">Kegiatan</a>
                    <a href="/kepengurusan" class="text-sm uppercase tracking-wide font-bold transition-colors duration-200 {{ request()->is('kepengurusan*') ? 'text-pikr-accent border-b-2 border-pikr-accent py-1' : 'text-gray-300 hover:text-white' }}">Kepengurusan</a>
                    <a href="/ruang-sebaya" class="text-sm uppercase tracking-wide font-bold transition-colors duration-200 {{ request()->is('ruang-sebaya*') ? 'text-blue-400 border-b-2 border-blue-400 py-1' : 'text-gray-300 hover:text-white' }}">Ruang Sebaya</a>
                    
                    @auth
                        <a href="{{ route('dashboard') }}" class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white px-6 py-2.5 rounded-full font-bold transition-all duration-300 shadow-[0_4px_14px_0_rgba(16,185,129,0.3)] hover:shadow-[0_6px_20px_rgba(16,185,129,0.4)] hover:-translate-y-0.5">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white/10 border border-white/20 text-white px-6 py-2.5 rounded-full font-bold hover:bg-white/20 transition-all duration-300 shadow-sm hover:-translate-y-0.5">
                            Login
                        </a>
                    @endauth
                </nav>

                <!-- Mobile Menu Button -->
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="md:hidden text-white p-2 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" style="display: none;"></path>
                        <path x-show="isMobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Dropdown -->
            <div x-show="isMobileMenuOpen" x-transition class="md:hidden absolute w-full bg-pikr-darkgreen border-b border-white/10 shadow-lg overflow-hidden py-4" style="display: none;">
                <div class="flex flex-col px-6 space-y-4">
                    <a href="/" class="text-gray-300 hover:text-white font-bold uppercase tracking-wide">Beranda</a>
                    <a href="/informasi" class="text-gray-300 hover:text-white font-bold uppercase tracking-wide">Informasi</a>
                    <a href="/kegiatan" class="text-gray-300 hover:text-white font-bold uppercase tracking-wide">Kegiatan</a>
                    <a href="/kepengurusan" class="text-gray-300 hover:text-white font-bold uppercase tracking-wide">Kepengurusan</a>
                    <a href="/ruang-sebaya" class="text-blue-400 hover:text-blue-300 font-bold uppercase tracking-wide">Ruang Sebaya</a>
                    <div class="pt-4 border-t border-white/10">
                        @auth
                            <a href="{{ route('dashboard') }}" class="block w-full text-center bg-emerald-500 text-white py-3 rounded-xl font-bold">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center bg-white/10 text-white border border-white/20 py-3 rounded-xl font-bold">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-grow relative z-10">
            @yield('content')
        </main>

        <!-- Global Footer -->
        <footer class="relative z-10 bg-pikr-dark border-t border-white/10 pt-16 pb-8 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <div class="md:col-span-2">
                        <div class="flex items-center gap-3 mb-6">
                            <img src="/images/gnre lrvel.png" alt="GenRe Logo" class="w-10 h-10 object-contain" />
                            <img src="/images/smc lrvel.png" alt="SMC Logo" class="w-10 h-10 object-contain" />
                            <img src="/images/pik r, lrvel.png" alt="PIK-R Logo" class="w-10 h-10 object-contain" />
                            <span class="font-extrabold text-xl text-white tracking-tight ml-2">PIK-R SKAKMATT</span>
                        </div>
                        <p class="text-gray-400 leading-relaxed max-w-md">
                            Pusat Informasi dan Konseling Remaja SMK Negeri 1 Purwokerto. Ruang tumbuh, berbagi, dan berkembang bersama menjadi generasi berencana.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Tautan Cepat</h4>
                        <ul class="space-y-3">
                            <li><a href="/" class="text-gray-400 hover:text-pikr-accent transition-colors">Beranda</a></li>
                            <li><a href="/informasi" class="text-gray-400 hover:text-pikr-accent transition-colors">Informasi & Edukasi</a></li>
                            <li><a href="/kegiatan" class="text-gray-400 hover:text-pikr-accent transition-colors">Jadwal Kegiatan</a></li>
                            <li><a href="/kepengurusan" class="text-gray-400 hover:text-pikr-accent transition-colors">Struktur Pengurus</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-4 uppercase tracking-wider text-sm">Hubungi Kami</h4>
                        <ul class="space-y-3">
                            <li class="text-gray-400 flex items-start gap-3">
                                <svg class="w-5 h-5 text-pikr-accent shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>SMK Negeri 1 Purwokerto<br/>Jl. DR. Soeparno No.29, Purwokerto Wetan, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53123</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-500 text-sm">© {{ date('Y') }} PIK-R SKAKMATT SMK N 1 Purwokerto. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
