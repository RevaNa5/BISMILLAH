@extends('layouts.public')

@section('title', 'Pusat Informasi & Edukasi - PIK-R SKAKMATT')

@section('content')
<!-- Page Hero Header -->
<section class="relative py-24 border-b border-emerald-500/10">
    <div class="absolute inset-0 bg-pikr-dark overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-pikr-primary/15 blur-[120px] rounded-full translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-600/10 blur-[100px] rounded-full -translate-x-1/3 translate-y-1/3"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 rounded-full bg-white/5 border border-pikr-accent/20 backdrop-blur-md">
            <span class="text-xs font-bold text-pikr-accent uppercase tracking-widest">Edukasi & Publikasi</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-sm">
            Pusat Informasi
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed font-light">
            Portal materi edukasi remaja, kesehatan reproduksi, perencanaan masa depan, serta life skills PIK-R SKAKMATT.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 pb-32">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10 border-b border-white/10 pb-4">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Daftar Artikel & Materi Edukasi</h2>
            <p class="text-sm text-gray-400 mt-1">Materi lengkap seputar Kesehatan Reproduksi, Character Building, dan Life Skills</p>
        </div>
        <span class="text-xs font-semibold px-3 py-1.5 bg-pikr-primary/20 text-pikr-accent border border-pikr-primary/30 rounded-full self-start sm:self-auto">
            Total: {{ count($articles) }} Artikel Materi
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($articles as $article)
        <!-- Article Card -->
        <div class="group bg-pikr-darkgreen/80 backdrop-blur-md rounded-3xl overflow-hidden border border-white/10 shadow-xl flex flex-col transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-emerald-950/40 hover:border-pikr-primary/40">
            <!-- Cover Image & Category Container -->
            <div class="relative h-56 w-full overflow-hidden bg-slate-900">
                <img src="{{ asset('images/' . $article['image']) }}" 
                     alt="{{ $article['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                     onerror="this.src='/images/placeholder.png'">
                
                <div class="absolute inset-0 bg-gradient-to-t from-pikr-darkgreen/90 via-transparent to-black/20 opacity-80 group-hover:opacity-60 transition-opacity duration-300"></div>

                <!-- Category Badge Overlay -->
                <div class="absolute top-4 left-4 z-20">
                    <span class="bg-pikr-dark/90 backdrop-blur-md text-pikr-accent border border-white/15 text-[10px] font-extrabold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg">
                        {{ $article['category'] }}
                    </span>
                </div>
            </div>

            <!-- Card Content Body -->
            <div class="p-6 flex-grow flex flex-col justify-between">
                <div>
                    <!-- Author (NO DATE!) -->
                    <div class="text-xs font-bold text-pikr-accent mb-2.5 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>{{ $article['author'] }}</span>
                    </div>

                    <!-- Article Title -->
                    <h3 class="text-lg font-bold text-white mb-3 leading-snug group-hover:text-pikr-accent transition-colors">
                        {{ $article['title'] }}
                    </h3>

                    <!-- Article Summary -->
                    <p class="text-gray-300 text-sm line-clamp-3 leading-relaxed mb-6 font-normal">
                        {{ $article['summary'] }}
                    </p>
                </div>

                <!-- Read Article Button -->
                <div class="mt-auto pt-4 border-t border-white/10 flex items-center justify-between">
                    <a href="{{ url('/informasi/' . $article['slug']) }}" 
                       class="w-full bg-white/5 hover:bg-pikr-primary text-white hover:text-white font-semibold py-2.5 px-4 rounded-xl text-xs uppercase tracking-wider text-center transition-all duration-300 flex items-center justify-center gap-2 group/btn border border-white/10 hover:border-pikr-primary">
                        <span>Baca Artikel</span>
                        <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
