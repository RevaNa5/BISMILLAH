@extends('layouts.admin')

@section('title', 'Direktori Anggota - PIK-R SKAKMATT')

@section('header', 'Direktori Anggota')

@section('content')
<!-- Menerapkan background custom HANYA untuk section ini tanpa merusak sidebar admin yang dark mode -->
<div class="rounded-3xl overflow-hidden shadow-2xl bg-[#F6F8F4] -mt-4 mb-8">
    <div class="max-w-7xl mx-auto p-6 md:p-10 space-y-8">
        
        <!-- Header & Stats -->
        <div class="flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#103D2A] tracking-tight">Anggota PIK-R SKAKMATT</h1>
                <p class="text-[#103D2A]/70 mt-2">Daftar seluruh anggota aktif berdasarkan pangkalan data.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full lg:w-auto">
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-emerald-100/50 flex flex-col items-center justify-center text-center">
                    <span class="text-xs font-semibold text-[#103D2A]/60 uppercase tracking-wider">Total</span>
                    <span class="text-2xl font-black text-[#103D2A]">{{ $totalAnggota }}</span>
                </div>
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-emerald-100/50 flex flex-col items-center justify-center text-center">
                    <span class="text-xs font-semibold text-emerald-600/70 uppercase tracking-wider">Kelas X</span>
                    <span class="text-2xl font-black text-emerald-600">{{ $totalX }}</span>
                </div>
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-emerald-100/50 flex flex-col items-center justify-center text-center">
                    <span class="text-xs font-semibold text-teal-600/70 uppercase tracking-wider">Kelas XI</span>
                    <span class="text-2xl font-black text-teal-600">{{ $totalXI }}</span>
                </div>
                <div class="bg-white rounded-2xl p-4 shadow-sm border border-emerald-100/50 flex flex-col items-center justify-center text-center">
                    <span class="text-xs font-semibold text-sky-600/70 uppercase tracking-wider">Kelas XII</span>
                    <span class="text-2xl font-black text-sky-600">{{ $totalXII }}</span>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
            <form action="{{ route('anggota.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1 relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama anggota..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-[#103D2A] focus:ring-1 focus:ring-[#103D2A] outline-none text-gray-700 bg-gray-50 transition-all">
                    <svg class="w-5 h-5 absolute left-3 top-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                
                <!-- Filter Tingkat -->
                <div class="w-full md:w-40">
                    <select name="level" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#103D2A] focus:ring-1 focus:ring-[#103D2A] outline-none text-gray-700 bg-gray-50 appearance-none">
                        <option value="">Semua Tingkat</option>
                        <option value="X" {{ request('level') == 'X' ? 'selected' : '' }}>Kelas X</option>
                        <option value="XI" {{ request('level') == 'XI' ? 'selected' : '' }}>Kelas XI</option>
                        <option value="XII" {{ request('level') == 'XII' ? 'selected' : '' }}>Kelas XII</option>
                    </select>
                </div>

                <!-- Filter Kelas -->
                <div class="w-full md:w-56">
                    <select name="kelas" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#103D2A] focus:ring-1 focus:ring-[#103D2A] outline-none text-gray-700 bg-gray-50 appearance-none">
                        <option value="">Semua Jurusan</option>
                        @foreach($kelasList as $kelas)
                            <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>{{ $kelas }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-2">
                    <button type="submit" class="px-6 py-3 bg-[#103D2A] hover:bg-[#0c2f20] text-white rounded-xl font-semibold transition-colors flex items-center justify-center shadow-md shadow-[#103D2A]/20">
                        Filter
                    </button>
                    @if(request()->hasAny(['search', 'level', 'kelas']))
                        <a href="{{ route('anggota.index') }}" class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl font-semibold transition-colors flex items-center justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Grid Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($anggota as $index => $orang)
                @php
                    // Extract level (X, XI, XII) from kelas string
                    $level = explode(' ', $orang->kelas)[0] ?? 'X';
                    
                    // Determine badge color based on level
                    $badgeClass = match($level) {
                        'X' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                        'XI' => 'bg-teal-100 text-teal-700 border-teal-200',
                        'XII' => 'bg-sky-100 text-sky-700 border-sky-200',
                        default => 'bg-gray-100 text-gray-700 border-gray-200'
                    };
                    
                    // Calculate absolute number based on pagination
                    $number = ($anggota->currentPage() - 1) * $anggota->perPage() + $index + 1;
                @endphp
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:shadow-md hover:border-emerald-200/60 transition-all flex items-center gap-4 group">
                    <!-- Kotak Nomor Hijau -->
                    <div class="w-12 h-12 flex-shrink-0 bg-[#103D2A]/5 group-hover:bg-[#103D2A] rounded-xl flex items-center justify-center transition-colors duration-300">
                        <span class="text-[#103D2A] group-hover:text-white font-bold text-lg">{{ $number }}</span>
                    </div>

                    <!-- Info Anggota -->
                    <div class="flex-1 min-w-0">
                        <h3 class="text-base font-bold text-gray-800 truncate" title="{{ $orang->user->name }}">
                            {{ $orang->user->name }}
                        </h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold border {{ $badgeClass }}">
                                KELAS {{ $level }}
                            </span>
                            <span class="text-sm font-medium text-gray-500 truncate">
                                {{ $orang->kelas }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-2xl p-12 flex flex-col items-center justify-center text-center border border-dashed border-gray-300">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-700">Tidak ada anggota ditemukan</h3>
                    <p class="text-gray-500 mt-1">Coba sesuaikan kata kunci atau filter pencarian Anda.</p>
                    @if(request()->hasAny(['search', 'level', 'kelas']))
                        <a href="{{ route('anggota.index') }}" class="mt-4 px-5 py-2 bg-[#103D2A] text-white rounded-lg text-sm font-semibold hover:bg-[#0c2f20] transition-colors">Reset Filter</a>
                    @endif
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($anggota->hasPages())
            <div class="mt-8 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                {{ $anggota->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection
