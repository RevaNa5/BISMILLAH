<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\OrganizationPeriod;
use App\Models\Division;
use App\Models\Position;
use App\Models\Member;
use App\Models\Due;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Roles & Permissions (Spatie)
        $roles = [
            'ADMIN', 'PEMBINA', 'PELATIH', 'KETUA', 'WAKIL_KETUA', 
            'SEKRETARIS', 'BENDAHARA', 'KEGIATAN', 'HUMAS', 'PDD', 
            'PKWU', 'KONSELOR_SEBAYA', 'USER'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // 2. Organization Period
        $period = OrganizationPeriod::create([
            'name' => '2025/2026',
            'start_date' => '2025-07-01',
            'end_date' => '2026-06-30',
            'is_active' => true,
        ]);

        // 3. Divisions
        $divKegiatan = Division::create(['name' => 'Kegiatan', 'description' => 'Mengurus agenda kegiatan']);
        $divHumas = Division::create(['name' => 'Hubungan Masyarakat', 'description' => 'Humas dan komunikasi eksternal']);
        $divPdd = Division::create(['name' => 'Publikasi, Dekorasi & Dokumentasi (PDD)', 'description' => 'Dokumentasi dan desain grafis']);
        $divPkwu = Division::create(['name' => 'Prakarya & Wirausaha (PKWU)', 'description' => 'Wirausaha dan pendanaan']);
        $divKonselor = Division::create(['name' => 'Konselor Sebaya', 'description' => 'Edukasi dan konseling teman sebaya']);

        // 4. Positions
        $posKetua = Position::create(['title' => 'Ketua']);
        $posWaka = Position::create(['title' => 'Wakil Ketua']);
        $posSekre = Position::create(['title' => 'Sekretaris']);
        $posBenda = Position::create(['title' => 'Bendahara']);
        $posAnggota = Position::create(['title' => 'Anggota']);

        // 5. Users
        $adminUser = User::create([
            'name' => 'Admin SKAKMATT',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'ADMIN',
        ]);
        $adminUser->assignRole('ADMIN');

        $ketuaUser = User::create([
            'name' => 'Budi Ketua',
            'email' => 'budi.ketua@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'KETUA',
        ]);
        $ketuaUser->assignRole('KETUA');
        Member::create(['user_id' => $ketuaUser->id, 'organization_period_id' => $period->id, 'position_id' => $posKetua->id]);

        $bendaUser = User::create([
            'name' => 'Siti Bendahara',
            'email' => 'siti.bendahara@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'BENDAHARA',
        ]);
        $bendaUser->assignRole('BENDAHARA');
        Member::create(['user_id' => $bendaUser->id, 'organization_period_id' => $period->id, 'position_id' => $posBenda->id]);

        $memberUser = User::create([
            'name' => 'Ahmad Anggota',
            'email' => 'ahmad.anggota@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'USER',
        ]);
        $memberUser->assignRole('USER');
        Member::create(['user_id' => $memberUser->id, 'organization_period_id' => $period->id, 'division_id' => $divKegiatan->id, 'position_id' => $posAnggota->id]);

        // 6. Dues (Iuran)
        Due::create([
            'organization_period_id' => $period->id,
            'title' => 'Kas Bulan Agustus',
            'amount' => 5000,
            'type' => 'BULANAN',
            'deadline' => '2025-08-31',
        ]);

        // 7. Event
        Event::create([
            'organization_period_id' => $period->id,
            'title' => 'SKAKMATT Discussion Time (SDT) #1',
            'slug' => 'sdt-1',
            'description' => 'Diskusi santai mengenai Triad KRR.',
            'date' => '2025-08-15',
            'time' => '15:30:00',
            'location' => 'Aula Sekolah',
            'quota' => 50,
            'status' => 'OPEN',
        ]);
    }
}
