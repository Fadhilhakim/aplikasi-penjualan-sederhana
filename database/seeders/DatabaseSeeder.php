<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'password' => Hash::make('Admin123'),
            'status' => 'ADMIN' // status bertipe data enum
        ]);
        
        $this->call(StaticProductSeeder::class);
        $this->call(DashboardDisplaySeeder::class);
    }

}
