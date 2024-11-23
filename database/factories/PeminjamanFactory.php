<?php

namespace Database\Factories;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Date;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peminjaman>
 */
class PeminjamanFactory extends Factory
{
    protected $model = Peminjaman::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_buku = Buku::inRandomOrder()->take(1)->get('id_buku');
        $id_anggota = Anggota::inRandomOrder()->take(1)->get('id_anggota');
        return [
            'id_buku' => $id_buku[0]->id_buku,
            'id_anggota' => $id_anggota[0]->id_anggota,
            'tanggal_pinjam' => fake()->unixTime(new DateTime('-3 weeks')),
            'tanggal_kembali' => null,
        ];
    }
}
