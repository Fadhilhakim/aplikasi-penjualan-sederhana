<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DashboardDisplay;

class DashboardDisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DashboardDisplay::create([
            'title' => 'Diskon Akhir Tahun<br />Up to 35% OFF!',
            'description' => 'Tunggu Apa Lagi!!! Segera Beli',
            'bg_url' => 'https://i.pinimg.com/736x/fe/bc/bb/febcbb34fcead6b3ac7894baea63b1a9.jpg',
        ]);
    }
}
