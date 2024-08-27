<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dinas = User::create([
            'name' => 'Dinas',
            'email' => 'dinas@email.com',
            'password' => bcrypt('dinas123'),
        ]);
        $dinas->assignRole('dinas');

        $eventorganizer = User::create([
            'name' => 'Event Organizer',
            'email' => 'eventorganizer@email.com',
            'password' => bcrypt('eventorganizer123'),
        ]);
        $eventorganizer->assignRole('event-organizer');

        $pengunjung = User::create([
            'name' => 'Pengunjung',
            'email' => 'pengunjung@email.com',
            'password' => bcrypt('pengunjung123'),
        ]);
        $pengunjung->assignRole('pengunjung');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
        ]);
        $admin->assignRole('admin');
    }
}
