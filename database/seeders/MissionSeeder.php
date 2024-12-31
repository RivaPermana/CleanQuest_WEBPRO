<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mission;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mission::create([
            'name' => 'Membersihkan Kamar',
            'points' => 50,
            'image' => 'assets/img1.png'
        ]);

        Mission::create([
            'name' => 'Membersihkan Halaman Rumah',
            'points' => 100,
            'image' => 'assets/img2.png'
        ]);

        Mission::create([
            'name' => 'Membersihkan Kamar',
            'points' => 30,
            'image' => 'assets/img3.png'
        ]);
    }
}
