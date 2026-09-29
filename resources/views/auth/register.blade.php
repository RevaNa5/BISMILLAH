@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="text-center mb-8">
    <h2 class="text-3xl font-bold text-white mb-2 tracking-tight">Daftar Akun Baru</h2>
    <p class="text-gray-400 text-sm">Bergabung bersama PIK-R SKAKMATT hari ini</p>
</div>

<form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-300 mb-1.5">Nama Lengkap</label>
        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
            autocomplete="name"
            required
        />
        @error('name')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
            autocomplete="username"
            required
        />
        @error('email')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Password</label>
        <input
            id="password"
            type="password"
            name="password"
            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
            autocomplete="new-password"
            required
        />
        @error('password')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1.5">Konfirmasi Password</label>
        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
            autocomplete="new-password"
            required
        />
        @error('password_confirmation')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <button
        type="submit"
        class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-xl px-4 py-3.5 mt-6 hover:from-emerald-400 hover:to-teal-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 shadow-[0_0_15px_rgba(16,185,129,0.3)] hover:shadow-[0_0_25px_rgba(16,185,129,0.5)] transform transition-all duration-300 hover:-translate-y-1 active:translate-y-0"
    >
        REGISTER
    </button>
</form>

<div class="mt-8 text-center text-sm text-gray-500">
    Sudah punya akun?
    <a href="{{ route('login') }}" class="text-emerald-400 hover:text-emerald-300 font-medium transition-colors">
        Login di sini
    </a>
</div>
@endsection
