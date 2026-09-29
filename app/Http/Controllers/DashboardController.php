<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Division;
use App\Models\Event;
use App\Models\CashTransaction;
use App\Models\Due;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        $stats = [];

        if (in_array($role, ['ADMIN', 'KETUA', 'PEMBINA'])) {
            $stats['total_members'] = Member::count();
            $stats['total_divisions'] = Division::count();
            $stats['active_events'] = Event::where('status', 'OPEN')->count();
        }

        if (in_array($role, ['ADMIN', 'BENDAHARA'])) {
            $income = CashTransaction::where('type', 'INCOME')->sum('amount');
            $expense = CashTransaction::where('type', 'EXPENSE')->sum('amount');
            $stats['cash_balance'] = $income - $expense;
            $stats['total_income'] = $income;
            $stats['total_expense'] = $expense;
            $stats['total_dues'] = Due::count();
        }

        if ($role === 'USER') {
            // Personal user stats
            $stats['my_events'] = $user->eventRegistrations()->count() ?? 0;
            $stats['my_unpaid_dues'] = Due::count() - $user->payments()->where('status', 'LUNAS')->count();
        }

        // Common data for everyone
        $upcomingEvents = Event::where('status', 'OPEN')->orderBy('date', 'asc')->take(5)->get();

        return view('dashboard', [
            'role' => $role,
            'stats' => $stats,
            'upcomingEvents' => $upcomingEvents,
        ]);
    }
}
