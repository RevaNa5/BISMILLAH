@extends('layouts.admin')

@section('title', 'Kas & Keuangan')
@section('header', 'Kas & Tagihan')

@section('content')
<div x-data="{ 
    showModal: false, 
    payModal: false, 
    selectedDue: null,
    payData: {
        due_id: '',
        payment_method: 'TRANSFER',
        proof: null
    },
    openPayModal(due) {
        this.selectedDue = due;
        this.payData.due_id = due.id;
        this.payModal = true;
    }
}">

    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="text-xl font-bold text-pikr-dark text-slate-800">Daftar Tagihan Kas</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola dan bayar tagihan iuran organisasi PIK-R SKAKMATT.</p>
        </div>
        @if($canManageFinance)
            <button 
                @click="showModal = true"
                class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors shadow-sm"
            >
                + Buat Tagihan Baru
            </button>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl font-medium">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($dues as $due)
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full">
                            {{ $due['type'] }}
                        </div>
                        @if($due['status'] === 'LUNAS')
                            <span class="text-emerald-500 font-bold text-sm">LUNAS</span>
                        @elseif($due['status'] === 'MENUNGGU_VERIFIKASI')
                            <span class="text-amber-500 font-bold text-sm">MENUNGGU VERIFIKASI</span>
                        @elseif($due['status'] === 'DITOLAK')
                            <span class="text-red-500 font-bold text-sm">DITOLAK</span>
                        @else
                            <span class="text-gray-400 font-bold text-sm">BELUM BAYAR</span>
                        @endif
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-1">{{ $due['title'] }}</h4>
                    <p class="text-3xl font-bold text-gray-900 mb-6">
                        Rp {{ number_format($due['amount'], 0, ',', '.') }}
                    </p>
                </div>

                @if($due['status'] === 'DITOLAK')
                    <div class="bg-red-50 border border-red-100 text-red-600 p-3 rounded-lg text-sm mb-4">
                        <strong>Ditolak:</strong> {{ $due['rejection_reason'] }}
                    </div>
                @endif

                <div>
                    @if($due['status'] === 'BELUM BAYAR' || $due['status'] === 'DITOLAK')
                        <button
                            @click="openPayModal({{ json_encode($due) }})"
                            class="w-full bg-emerald-600 text-white py-3 rounded-xl font-bold hover:bg-emerald-700 transition-colors"
                        >
                            Bayar Sekarang
                        </button>
                    @else
                        <button disabled class="w-full bg-gray-100 text-gray-400 py-3 rounded-xl font-bold cursor-not-allowed">
                            {{ $due['status'] === 'LUNAS' ? 'Sudah Lunas' : 'Menunggu Verifikasi' }}
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
        
        @if(count($dues) === 0)
            <div class="col-span-full bg-white rounded-2xl p-8 text-center border border-gray-100">
                <p class="text-gray-500">Belum ada tagihan kas.</p>
            </div>
        @endif
    </div>

    <!-- Modal Create Due -->
    <div x-show="showModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div x-show="showModal" x-transition.opacity class="fixed inset-0 bg-black/50" @click="showModal = false"></div>
        <div x-show="showModal" x-transition class="bg-white rounded-2xl w-full max-w-md p-6 relative z-10 shadow-2xl">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Buat Tagihan Baru</h3>
            <form method="POST" action="{{ route('kas.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Tagihan</label>
                    <input type="text" name="title" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200" required />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nominal (Rp)</label>
                    <input type="number" name="amount" min="0" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200" required />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kas</label>
                    <select name="type" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200">
                        <option value="BULANAN">Bulanan</option>
                        <option value="KEGIATAN">Kegiatan</option>
                        <option value="KHUSUS">Khusus</option>
                    </select>
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="showModal = false" class="px-4 py-2 text-gray-600 font-medium hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Pay -->
    <div x-show="payModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div x-show="payModal" x-transition.opacity class="fixed inset-0 bg-black/50" @click="payModal = false"></div>
        <div x-show="payModal" x-transition class="bg-white rounded-2xl w-full max-w-md p-6 relative z-10 shadow-2xl">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Bayar Tagihan</h3>
            <p class="text-sm text-gray-600 mb-4">Anda akan membayar tagihan <strong x-text="selectedDue?.title"></strong> sebesar <strong x-text="selectedDue ? 'Rp ' + new Intl.NumberFormat('id-ID').format(selectedDue.amount) : ''"></strong>.</p>
            <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="due_id" x-model="payData.due_id" />
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <select name="payment_method" x-model="payData.payment_method" class="w-full rounded-lg border-gray-300 focus:border-emerald-500 focus:ring focus:ring-emerald-200">
                        <option value="TRANSFER">Transfer Bank</option>
                        <option value="QRIS">QRIS</option>
                        <option value="CASH">Tunai (Titip Pengurus)</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Bukti (JPG/PNG)</label>
                    <input type="file" name="proof" accept="image/jpeg,image/png,image/jpg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100" required />
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" @click="payModal = false" class="px-4 py-2 text-gray-600 font-medium hover:bg-gray-100 rounded-lg">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-emerald-600 text-white font-medium rounded-lg hover:bg-emerald-700">Kirim Bukti Pembayaran</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
