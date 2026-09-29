@extends('layouts.public')

@section('title', 'Kegiatan & Event - PIK-R SKAKMATT')

@section('content')
@php
$kegiatan = [
    [
        'title' => 'Dokumentasi Serah Terima Jabatan PIK-R 25/26',
        'date_display' => 'Awal Kepengurusan',
        'badge' => 'Serah Terima Jabatan',
        'month' => 'AWAL',
        'day' => '25/26',
        'location' => 'Workshop',
        'image' => 'dokumentasi serah terima jabatan pikr 2526.jpeg',
    ],
    [
        'title' => 'Skakmatt Anniversary',
        'date_display' => '9 Januari 2026',
        'badge' => 'Anniversary',
        'month' => 'JAN',
        'day' => '09',
        'location' => 'SMKN 1 Purwokerto',
        'image' => 'skakmatt anniversary.jpeg',
    ],
    [
        'title' => 'Skakmattcreatif',
        'date_display' => '14 Januari 2026',
        'badge' => 'Kreativitas',
        'month' => 'JAN',
        'day' => '14',
        'location' => 'Aula',
        'image' => 'skakmattcreatif.jpeg',
    ],
    [
        'title' => 'Anjangsini Anjangsana SMKN 1 Purwokerto x Skaga',
        'date_display' => '12 Februari 2026',
        'badge' => 'Studi Banding',
        'month' => 'FEB',
        'day' => '12',
        'location' => 'Workshop',
        'image' => 'anjangsini anjangsana smecone x skaga.jpeg',
    ],
    [
        'title' => 'Buka bersama PIK-R SKAKMATT',
        'date_display' => '5 Maret 2026',
        'badge' => 'Kebersamaan',
        'month' => 'MAR',
        'day' => '05',
        'location' => 'Samara Cafe',
        'image' => 'bukber.jpeg',
    ],
    [
        'title' => 'Technical Meeting Pemilihan duta genre',
        'date_display' => '20 April 2026',
        'badge' => 'Technical Meeting',
        'month' => 'APR',
        'day' => '20',
        'location' => 'Aula',
        'image' => 'tm pildugen.jpeg',
    ],
    [
        'title' => 'Pembekalan pemilihan duta genre dengan Kak Lilia',
        'date_display' => '7 Mei 2026',
        'badge' => 'Pembekalan',
        'month' => 'MEI',
        'day' => '07',
        'location' => 'Workshop',
        'image' => 'pembekalan pildugen dengan kak lilia.jpeg',
    ],
    [
        'title' => 'Seleksi Pemilihan duta genre',
        'date_display' => '13 Mei 2026',
        'badge' => 'Seleksi',
        'month' => 'MEI',
        'day' => '13',
        'location' => 'Aula',
        'image' => 'seleksi pildugen.jpeg',
    ],
    [
        'title' => 'Seleksi Penyuluhan',
        'date_display' => '18 Mei 2026',
        'badge' => 'Seleksi',
        'month' => 'MEI',
        'day' => '18',
        'location' => 'Aula',
        'image' => 'seleksi penyuluhan.jpeg',
    ],
    [
        'title' => 'Pembekalan Pemilihan duta genre dari Mba Dista',
        'date_display' => '11 Juni 2026',
        'badge' => 'Pembekalan',
        'month' => 'JUN',
        'day' => '11',
        'location' => 'Aula',
        'image' => 'pembekalan pildugen dari mba dista.jpeg',
    ],
    [
        'title' => 'Pemilihan duta genre',
        'date_display' => '17 Juni 2026',
        'badge' => 'Pemilihan Duta',
        'month' => 'JUN',
        'day' => '17',
        'location' => 'Workshop',
        'image' => 'pildugen.jpeg',
    ],
    [
        'title' => 'Forum Perdana',
        'date_display' => '29 Juli 2026',
        'badge' => 'Forum Diskusi',
        'month' => 'JUL',
        'day' => '29',
        'location' => 'Masjid',
        'image' => 'forum perdana.jpeg',
    ],
    [
        'title' => 'Skakmatt Goes to SMPN 9 Purwokerto',
        'date_display' => '31 Juli 2026',
        'badge' => 'Sosialisasi',
        'month' => 'JUL',
        'day' => '31',
        'location' => 'SMPN 9 Purwokerto',
        'image' => 'skakmatt goes to SMPN 9 purwokerto.jpeg',
    ],
    [
        'title' => 'Skakmatt Discussion Time',
        'date_display' => '8 Agustus 2026',
        'badge' => 'Discussion Time',
        'month' => 'AGU',
        'day' => '08',
        'location' => 'Buken',
        'image' => 'sdt buken.jpeg',
    ],
    [
        'title' => 'Perkenalan dengan Kaka Percabangan',
        'date_display' => '12 Agustus 2026',
        'badge' => 'Perkenalan',
        'month' => 'AGU',
        'day' => '12',
        'location' => 'SMKN 1 Purwokerto',
        'image' => 'perkenalan dengan kaka percabangan.jpeg',
    ],
    [
        'title' => 'Reorganisasi PIK-R SKAKMATT 2026',
        'date_display' => 'Reorganisasi 2026',
        'badge' => 'Reorganisasi',
        'month' => 'REOR',
        'day' => '2026',
        'location' => 'Lapangan SMKN 1 Purwokerto',
        'image' => 'reor pikr 2026.jpeg',
    ],
];
@endphp

<!-- Page Hero Header -->
<section class="relative py-24 border-b border-emerald-500/10">
    <div class="absolute inset-0 bg-pikr-dark overflow-hidden pointer-events-none">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-pikr-primary/15 blur-[120px] rounded-full translate-x-1/3 -translate-y-1/3"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-emerald-600/10 blur-[100px] rounded-full -translate-x-1/3 translate-y-1/3"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center justify-center px-4 py-1.5 mb-6 rounded-full bg-white/5 border border-pikr-accent/20 backdrop-blur-md">
            <span class="text-xs font-bold text-pikr-accent uppercase tracking-widest">Jadwal & Agenda</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 tracking-tight drop-shadow-sm">
            Kegiatan PIK-R
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto leading-relaxed font-light">
            Dokumentasi dan agenda kegiatan rutin, forum diskusi, pelatihan konselor, serta event SKAKMATT.
        </p>
    </div>
</section>

<!-- Content Section -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 pb-32">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10 border-b border-white/10 pb-4">
        <div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Dokumentasi & Agenda Kegiatan 2026</h2>
            <p class="text-sm text-gray-400 mt-1">Daftar kegiatan kepengurusan PIK-R SKAKMATT secara kronologis</p>
        </div>
        <span class="text-xs font-semibold px-3 py-1.5 bg-pikr-primary/20 text-pikr-accent border border-pikr-primary/30 rounded-full self-start sm:self-auto">
            Total: {{ count($kegiatan) }} Kegiatan
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($kegiatan as $item)
        <!-- Event Card -->
        <div class="group bg-pikr-darkgreen/80 backdrop-blur-md rounded-3xl overflow-hidden border border-white/10 shadow-xl flex flex-col transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-emerald-950/40 hover:border-pikr-primary/40">
            <!-- Image & Date Badge Container -->
            <div class="relative h-52 w-full overflow-hidden bg-slate-900">
                <img src="{{ asset('images/' . $item['image']) }}" 
                     alt="{{ $item['title'] }}" 
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out"
                     onerror="this.src='/images/placeholder.png'">
                
                <div class="absolute inset-0 bg-gradient-to-t from-pikr-darkgreen/90 via-transparent to-black/20 opacity-80 group-hover:opacity-60 transition-opacity duration-300"></div>

                <!-- Date Badge Overlay -->
                <div class="absolute top-4 left-4 bg-pikr-dark/90 backdrop-blur-md border border-white/15 rounded-2xl px-3.5 py-2 flex flex-col items-center justify-center text-center shadow-lg">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-pikr-accent">{{ $item['month'] }}</span>
                    <span class="text-lg font-black leading-tight text-white">{{ $item['day'] }}</span>
                </div>

                <!-- Category Badge Overlay -->
                <div class="absolute top-4 right-4 bg-emerald-500/80 backdrop-blur-md text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider border border-white/20">
                    {{ $item['badge'] }}
                </div>
            </div>

            <!-- Card Info Content -->
            <div class="p-6 flex flex-col flex-grow justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white mb-3 leading-snug group-hover:text-pikr-accent transition-colors">
                        {{ $item['title'] }}
                    </h3>

                    <div class="text-sm text-gray-300 space-y-2 mt-auto">
                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <div class="w-7 h-7 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-pikr-accent shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="font-medium">{{ $item['date_display'] }}</span>
                        </div>

                        <div class="flex items-center gap-2.5 text-xs text-gray-300">
                            <div class="w-7 h-7 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center text-pikr-accent shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <span class="font-medium">{{ $item['location'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
