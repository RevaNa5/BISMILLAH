@extends('layouts.public')

@section('title', 'Welcome to PIK-R SKAKMATT')

@section('content')
<!-- Hero Section (Natural Image Height to ensure 100% visibility) -->
<section class="relative w-full bg-pikr-background overflow-hidden flex flex-col justify-start -mt-20">
    
    <!-- Hero Image Container (Natural flow, dictates section height) -->
    <div class="relative w-full mt-20">
        <!-- Natural height ensures NO CROPPING AT ALL. Every person from top to bottom will be visible -->
        <img src="/images/all.jpeg" alt="Anggota PIK-R SKAKMATT" class="w-full h-auto object-contain block" onerror="this.src='/images/placeholder.png'" />
        
        <!-- Gradient Overlay: Darkens the top so the centered text is readable against the white wall -->
        <div class="absolute top-0 left-0 right-0 h-[60%] bg-gradient-to-b from-pikr-background via-pikr-background/80 to-transparent"></div>
        
        <!-- Gradient Overlay: Blends the bottom edge into the dark theme seamlessly -->
        <div class="absolute bottom-0 left-0 right-0 h-40 bg-gradient-to-t from-pikr-background via-pikr-background/70 to-transparent"></div>
        
        <!-- Centered Text Content (Positioned absolutely over the top white space) -->
        <div class="absolute inset-x-0 top-0 pt-16 md:pt-24 lg:pt-32 z-10 flex flex-col items-center">
            <div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-white/5 border border-white/10 text-gray-300 mb-6 backdrop-blur-md shadow-lg">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_rgba(52,211,153,0.8)] animate-pulse"></span>
                    <span class="text-xs font-bold tracking-widest uppercase">Ceria Ceria Ceria</span>
                </div>
                
                <!-- Heading -->
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-8xl font-black text-white tracking-tighter mb-4 lg:mb-6 leading-[1.1] drop-shadow-2xl">
                    PIK-R <br class="sm:hidden"/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pikr-accent to-emerald-300 drop-shadow-[0_0_20px_rgba(52,211,153,0.2)]">SKAKMATT</span>
                </h1>
                
                <!-- Paragraph -->
                <p class="text-sm sm:text-base md:text-xl text-gray-300 mb-8 lg:mb-10 font-medium leading-relaxed max-w-3xl mx-auto drop-shadow-md">
                    Ruang aman untuk bertumbuh, saling berbagi, dan berkembang bersama. Temukan potensimu, ukir kenangan indah, dan jadilah Generasi Berencana yang inspiratif.
                </p>
                
                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                    <a href="/kegiatan" class="bg-emerald-500 text-white px-8 py-3.5 lg:py-4 rounded-full font-bold text-sm lg:text-base hover:bg-emerald-400 transition-all duration-300 shadow-[0_8px_20px_rgba(16,185,129,0.3)] transform hover:-translate-y-1">
                        Kenal Lebih Dekat
                    </a>
                    <a href="/informasi" class="bg-[#2a2f38]/80 backdrop-blur-md text-white border border-white/20 px-8 py-3.5 lg:py-4 rounded-full font-bold text-sm lg:text-base hover:bg-[#373e4a] transition-all duration-300 shadow-lg transform hover:-translate-y-1">
                        Lihat Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Pills Section (Placed BELOW the hero image so it NEVER covers faces) -->
<section class="relative z-20 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-4">
    <div class="hidden md:grid grid-cols-4 gap-4 lg:gap-6">
        <div class="bg-[#1f242e]/90 backdrop-blur-lg border border-white/5 rounded-2xl p-6 text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
            <div class="text-3xl font-black text-emerald-400 mb-1">5</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Divisi Aktif</div>
        </div>
        <div class="bg-[#1f242e]/90 backdrop-blur-lg border border-white/5 rounded-2xl p-6 text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
            <div class="text-3xl font-black text-white mb-1">{{ \App\Models\Member::count() }}</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Anggota</div>
        </div>
        <div class="bg-[#1f242e]/90 backdrop-blur-lg border border-white/5 rounded-2xl p-6 text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
            <div class="text-3xl font-black text-emerald-400 mb-1">24</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Program Kerja</div>
        </div>
        <div class="bg-[#1f242e]/90 backdrop-blur-lg border border-white/5 rounded-2xl p-6 text-center shadow-xl hover:-translate-y-2 transition-transform duration-300">
            <div class="text-3xl font-black text-white mb-1">10+</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Konselor</div>
        </div>
    </div>

<!-- Stats for Mobile (Visible only on small screens) -->
<section class="lg:hidden w-full max-w-7xl mx-auto px-4 py-8 relative z-10">
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-pikr-darkgreen/80 backdrop-blur-xl border border-white/10 rounded-2xl p-5 text-center shadow-lg">
            <div class="text-3xl font-black text-pikr-accent mb-1">5</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Divisi Aktif</div>
        </div>
        <div class="bg-pikr-darkgreen/80 backdrop-blur-xl border border-white/10 rounded-2xl p-5 text-center shadow-lg">
            <div class="text-3xl font-black text-white mb-1">{{ \App\Models\Member::count() }}</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Anggota</div>
        </div>
        <div class="bg-pikr-darkgreen/80 backdrop-blur-xl border border-white/10 rounded-2xl p-5 text-center shadow-lg">
            <div class="text-3xl font-black text-pikr-accent mb-1">24</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Program Kerja</div>
        </div>
        <div class="bg-pikr-darkgreen/80 backdrop-blur-xl border border-white/10 rounded-2xl p-5 text-center shadow-lg">
            <div class="text-3xl font-black text-white mb-1">10+</div>
            <div class="text-[10px] text-gray-400 uppercase tracking-wider font-medium">Konselor</div>
        </div>
    </div>
</section>

<!-- Bento Grid Features Section -->
<section class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 pb-32">
    <div class="mb-16 text-center">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 tracking-tight">Apa yang Kami Lakukan?</h2>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto leading-relaxed">Kami berfokus pada pengembangan diri remaja, edukasi kesehatan reproduksi, dan persiapan kehidupan berkeluarga.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Large feature block -->
        <div class="md:col-span-2 bg-gradient-to-br from-white/10 to-transparent backdrop-blur-lg border border-emerald-500/20 rounded-3xl p-8 hover:border-pikr-accent/50 transition-all duration-300 group shadow-xl">
            <div class="w-16 h-16 bg-pikr-accent/20 text-pikr-accent rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <h3 class="text-3xl font-bold text-white mb-4 tracking-tight">Konseling Sebaya</h3>
            <p class="text-gray-300 text-lg leading-relaxed mb-8 max-w-xl">Layanan konseling dari remaja, untuk remaja. Kami menyediakan ruang aman untuk berdiskusi tentang masalah pribadi, sekolah, maupun keluarga tanpa penghakiman.</p>
            <a href="/informasi" class="text-pikr-accent font-semibold flex items-center gap-2 group-hover:gap-4 transition-all duration-300">
                Pelajari lebih lanjut <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
        
        <!-- Small feature block 1 -->
        <div class="bg-gradient-to-br from-white/5 to-transparent backdrop-blur-lg border border-white/10 rounded-3xl p-8 hover:border-pikr-accent/40 transition-all duration-300 group shadow-xl">
            <div class="w-14 h-14 bg-white/10 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-3 tracking-tight">Edukasi GenRe</h3>
            <p class="text-gray-400 leading-relaxed mb-6">Portal materi edukasi remaja, kesehatan reproduksi, perencanaan masa depan, serta life skills PIK-R SKAKMATT.</p>
            <a href="/informasi" class="text-pikr-accent/80 hover:text-pikr-accent font-medium transition-colors flex items-center gap-1 group-hover:gap-2 duration-300">
                Baca Artikel <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
        
        <!-- Small feature block 2 -->
        <div class="bg-gradient-to-br from-white/5 to-transparent backdrop-blur-lg border border-white/10 rounded-3xl p-8 hover:border-pikr-accent/40 transition-all duration-300 group shadow-xl">
            <div class="w-14 h-14 bg-white/10 text-white rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <h3 class="text-2xl font-bold text-white mb-3 tracking-tight">Event Tahunan</h3>
            <p class="text-gray-400 leading-relaxed mb-6">SKAKMATT Discussion Time, Buka Bersama, dan Reorganisasi Pengurus.</p>
            <a href="/kegiatan" class="text-pikr-accent/80 hover:text-pikr-accent font-medium transition-colors flex items-center gap-1 group-hover:gap-2 duration-300">
                Lihat Jadwal <span aria-hidden="true">&rarr;</span>
            </a>
        </div>

        <!-- Large Horizontal Block -->
        <div class="md:col-span-2 bg-pikr-emerald/30 backdrop-blur-lg border border-pikr-accent/30 rounded-3xl p-8 flex flex-col justify-center relative overflow-hidden group shadow-2xl">
            <div class="absolute right-0 bottom-0 opacity-10 group-hover:opacity-20 transition-opacity duration-500 transform translate-x-1/4 translate-y-1/4">
                <svg width="300" height="300" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-white mb-4 relative z-10 tracking-tight">Bergabung Bersama SKAKMATT</h3>
            <p class="text-pikr-light text-lg mb-8 relative z-10 max-w-xl leading-relaxed">Daftarkan dirimu dan jadilah bagian dari agen perubahan. Kelola kegiatan, ikuti event, dan temukan relasi positif.</p>
            <div class="relative z-10">
                <a href="/register" class="bg-white text-pikr-dark px-8 py-3.5 rounded-full font-bold hover:bg-pikr-verylight transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 active:scale-95 inline-block">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
