<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Buku::factory()->count(20)->create();
        // Anggota::factory()->count(20)->create();

        // $buku = Buku::factory()->create();
        // $anggota = Anggota::factory()->create();
        // Peminjaman::factory()
        //     ->has(Buku::factory()->count(3))
        //     ->has(Anggota::factory()->count(3))
        //     ->create();
        Buku::factory()->count(50)->create();
        Anggota::factory()->count(40)->create();
        Peminjaman::factory()->count(30)->create();
    }
}
