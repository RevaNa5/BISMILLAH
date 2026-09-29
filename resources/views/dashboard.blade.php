@extends('layouts.admin')

@section('title', 'Dashboard - PIK-R SKAKMATT')

@php
    $roles = Auth::user()->roles->pluck('name')->toArray();
    $primaryRole = count($roles) > 0 ? $roles[0] : 'USER';
@endphp

@section('header', 'Dashboard ' . $primaryRole)

@section('content')
<div class="max-w-7xl mx-auto space-y-8">
    <!-- Welcome Banner -->
    <div class="flex flex-col md:flex-row md:items-center justify-between bg-[#121B2D]/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-cyan-500/20 relative overflow-hidden group hover:shadow-[0_15px_50px_rgba(6,182,212,0.1)] transition-all duration-500">
        <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-600/20 rounded-full blur-[80px] -mr-20 -mt-20 pointer-events-none group-hover:scale-110 transition-transform duration-700"></div>
        <div class="relative z-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2 tracking-tight drop-shadow-[0_0_8px_rgba(255,255,255,0.2)]">
                Halo, <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-yellow-500 drop-shadow-[0_0_10px_rgba(252,211,77,0.4)]">{{ Auth::user()->name }}</span>! 👋
            </h1>
            <p class="text-cyan-100/70 text-lg">Selamat datang kembali di dashboard PIK-R SKAKMATT.</p>
        </div>
        
        <div class="mt-6 md:mt-0 relative z-10 flex gap-3">
            <a href="{{ route('feature.pending', 'Task Board') }}" class="px-5 py-2.5 bg-[#070b19] border border-cyan-500/30 text-cyan-400 font-bold rounded-xl hover:bg-cyan-500/10 hover:border-cyan-400 hover:shadow-[0_0_15px_rgba(6,182,212,0.4)] transition-all duration-300 shadow-sm flex items-center gap-2 group">
                <svg class="w-5 h-5 text-cyan-600/50 group-hover:text-cyan-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                Task Board
            </a>
        </div>
    </div>

    <!-- Main Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <x-stat-card title="Total Anggota" value="{{ \App\Models\Member::count() }}" color="cyan">
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </x-slot>
        </x-stat-card>
        <x-stat-card title="Divisi Aktif" value="5" color="violet">
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </x-slot>
        </x-stat-card>
        <x-stat-card title="Event Aktif" value="1" color="lime">
            <x-slot name="icon">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </x-slot>
        </x-stat-card>
        
        @if(in_array('BENDAHARA', $roles) || in_array('KETUA', $roles))
            <x-glowing-stat-card title="Saldo Kas Aktif" value="Rp 450.000" subtitle="+12% bulan ini">
                <x-slot name="icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </x-slot>
            </x-glowing-stat-card>
        @else
            <x-glowing-stat-card title="Tagihan Belum Lunas" value="Rp 0" subtitle="Status: Aman" gradient="from-blue-600 to-indigo-500">
                <x-slot name="icon">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </x-slot>
            </x-glowing-stat-card>
        @endif
    </div>

    <!-- Lower Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Events List -->
        <div class="lg:col-span-2 bg-[#121B2D]/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-cyan-500/20 relative overflow-hidden group hover:shadow-[0_15px_50px_rgba(6,182,212,0.1)] transition-all duration-500">
            <div class="flex justify-between items-center mb-6 relative z-10">
                <h3 class="text-xl font-bold text-white tracking-tight drop-shadow-[0_0_5px_rgba(255,255,255,0.2)]">Upcoming Events</h3>
                <a href="{{ route('feature.pending', 'Manajemen Event') }}" class="text-sm font-semibold text-cyan-400 hover:text-cyan-300 transition-colors hover:drop-shadow-[0_0_8px_rgba(6,182,212,0.8)]">Lihat Semua</a>
            </div>
            
            <div class="space-y-0 relative before:absolute before:inset-y-0 before:left-[35px] before:w-0.5 before:bg-cyan-500/20">
                <!-- Empty State / Single Event -->
                <div class="group/event relative flex items-start py-4 pl-0 pr-4 rounded-2xl hover:bg-cyan-500/5 transition-all duration-300 cursor-pointer">
                    <!-- Timeline Node -->
                    <div class="absolute left-[31px] top-[32px] w-2.5 h-2.5 rounded-full bg-cyan-400 border-2 border-[#121B2D] shadow-[0_0_10px_rgba(6,182,212,0.8)] z-10 group-hover/event:scale-150 group-hover/event:bg-white group-hover/event:shadow-[0_0_15px_rgba(255,255,255,1)] transition-all duration-300"></div>
                    
                    <div class="flex-shrink-0 w-[70px] flex flex-col items-center justify-center text-cyan-400 mr-6">
                        <span class="text-xs font-bold uppercase tracking-widest text-cyan-500/70">Aug</span>
                        <span class="text-2xl font-extrabold leading-none drop-shadow-[0_0_8px_rgba(6,182,212,0.4)]">15</span>
                    </div>
                    
                    <div class="flex-1 bg-[#070b19]/50 border border-cyan-500/10 rounded-2xl p-4 group-hover/event:border-cyan-500/40 group-hover/event:shadow-[0_0_20px_rgba(6,182,212,0.15)] transition-all duration-300">
                        <h4 class="text-base font-bold text-gray-200 group-hover/event:text-cyan-300 transition-colors mb-2">SKAKMATT Discussion Time (SDT) #1</h4>
                        <div class="flex items-center text-sm text-gray-400 gap-4">
                            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> 15:30:00</span>
                            <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Aula Sekolah</span>
                        </div>
                    </div>
                    
                    <div class="ml-4 self-center">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-violet-500/10 text-violet-400 border border-violet-500/30 shadow-[0_0_10px_rgba(139,92,246,0.2)]">
                            Internal
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-[#121B2D]/80 backdrop-blur-xl rounded-3xl p-8 shadow-[0_10px_40px_rgba(0,0,0,0.5)] border border-cyan-500/20 relative overflow-hidden group hover:shadow-[0_15px_50px_rgba(6,182,212,0.1)] transition-all duration-500">
            <h3 class="text-xl font-bold text-white tracking-tight mb-6 drop-shadow-[0_0_5px_rgba(255,255,255,0.2)]">Aksi Cepat</h3>
            <div class="grid grid-cols-2 gap-4">
                <x-action-card href="{{ route('feature.pending', 'Kegiatan & Forum') }}" title="Kegiatan" description="Lihat kalender">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </x-slot>
                </x-action-card>
                
                @if(in_array('BENDAHARA', $roles) || in_array('KETUA', $roles))
                    <x-action-card href="{{ route('kas.index') }}" title="Data Kas" description="Kelola tagihan">
                        <x-slot name="icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </x-slot>
                    </x-action-card>
                @else
                    <x-action-card href="{{ route('feature.pending', 'Tagihan Saya') }}" title="Tagihan" description="Bayar iuran">
                        <x-slot name="icon">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </x-slot>
                    </x-action-card>
                @endif

                <x-action-card href="{{ route('anggota.index') }}" title="Anggota" description="Direktori">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </x-slot>
                </x-action-card>

                <x-action-card href="{{ route('feature.pending', 'Pengumuman') }}" title="Informasi" description="Pengumuman">
                    <x-slot name="icon">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </x-slot>
                </x-action-card>
            </div>
        </div>
    </div>
</div>
@endsection
