<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function register(Request $request, Event $event)
    {
        // Must be authenticated
        $user = Auth::user();

        // Check if event is open
        if ($event->status !== 'OPEN') {
            return redirect()->back()->withErrors(['message' => 'Event ini tidak terbuka untuk pendaftaran.']);
        }

        // Check time constraints
        $now = now();
        if ($event->registration_start && $now->lt($event->registration_start)) {
            return redirect()->back()->withErrors(['message' => 'Pendaftaran belum dibuka.']);
        }
        if ($event->registration_end && $now->gt($event->registration_end)) {
            return redirect()->back()->withErrors(['message' => 'Pendaftaran sudah ditutup.']);
        }

        // Check quota using pessimistic locking
        return DB::transaction(function () use ($event, $user) {
            // Lock the event row for update
            $lockedEvent = Event::where('id', $event->id)->lockForUpdate()->first();

            // Check if already registered
            $existing = EventRegistration::where('event_id', $lockedEvent->id)
                ->where('user_id', $user->id)
                ->first();
                
            if ($existing) {
                return redirect()->back()->withErrors(['message' => 'Anda sudah terdaftar di event ini.']);
            }

            // Check Quota
            if ($lockedEvent->quota !== null) {
                $registeredCount = EventRegistration::where('event_id', $lockedEvent->id)->count();
                if ($registeredCount >= $lockedEvent->quota) {
                    return redirect()->back()->withErrors(['message' => 'Kuota pendaftaran telah penuh.']);
                }
            }

            // Generate unique ticket code
            $year = now()->format('Y');
            $randomString = strtoupper(Str::random(4));
            $regCode = "SKM-EVT-{$year}-{$randomString}-{$user->id}";

            EventRegistration::create([
                'event_id' => $lockedEvent->id,
                'user_id' => $user->id,
                'reg_code' => $regCode,
                'status' => 'REGISTERED'
            ]);

            return redirect()->back()->with('success', 'Berhasil mendaftar ke event dengan kode tiket: ' . $regCode);
        });
    }
}
