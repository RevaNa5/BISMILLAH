<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $totalAnggota = Member::count();
        $totalX = Member::where('kelas', 'LIKE', 'X %')->count();
        $totalXI = Member::where('kelas', 'LIKE', 'XI %')->count();
        $totalXII = Member::where('kelas', 'LIKE', 'XII %')->count();

        $query = Member::with('user');

        if ($request->filled('search')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('level')) {
            $query->where('kelas', 'like', $request->level . ' %');
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        $anggota = $query->paginate(20)->withQueryString();

        // Get unique class list for filter dropdown
        $kelasList = Member::select('kelas')->whereNotNull('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('anggota.index', compact(
            'anggota', 
            'totalAnggota', 
            'totalX', 
            'totalXI', 
            'totalXII',
            'kelasList'
        ));
    }
}
