@extends('layouts.guest')

@section('title', 'Log in')

@section('content')
<div class="text-center mb-8">
    <h2 class="text-3xl font-bold text-white mb-2 tracking-tight">Selamat Datang</h2>
    <p class="text-gray-400 text-sm">Silakan masuk ke akun pengurus/anggota kamu</p>
</div>

@if (session('status'))
    <div class="mb-4 text-sm font-medium text-emerald-400 bg-emerald-400/10 p-3 rounded-lg border border-emerald-400/20 text-center">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf

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
        <div class="flex justify-between items-center mb-1.5">
            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-xs text-emerald-400 hover:text-emerald-300 transition-colors">
                    Lupa password?
                </a>
            @endif
        </div>
        <input
            id="password"
            type="password"
            name="password"
            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
            autocomplete="current-password"
            required
        />
        @error('password')
            <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center">
        <label class="flex items-center cursor-pointer group">
            <div class="relative flex items-center justify-center w-5 h-5 mr-3">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember"
                    {{ old('remember') ? 'checked' : '' }}
                    class="peer appearance-none w-5 h-5 border border-white/20 rounded bg-black/20 checked:bg-emerald-500 checked:border-emerald-500 transition-all cursor-pointer"
                />
                <svg class="absolute w-3 h-3 text-white opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <span class="text-sm text-gray-400 group-hover:text-gray-300 transition-colors">
                Ingat saya
            </span>
        </label>
    </div>

    <button
        type="submit"
        class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 text-white font-bold rounded-xl px-4 py-3.5 mt-6 hover:from-emerald-400 hover:to-teal-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 shadow-[0_0_15px_rgba(16,185,129,0.3)] hover:shadow-[0_0_25px_rgba(16,185,129,0.5)] transform transition-all duration-300 hover:-translate-y-1 active:translate-y-0"
    >
        LOG IN
    </button>
</form>

<div class="mt-8 text-center text-sm text-gray-500">
    Belum punya akun?
    <a href="{{ route('register') }}" class="text-emerald-400 hover:text-emerald-300 font-medium transition-colors">
        Daftar di sini
    </a>
</div>
@endsection
