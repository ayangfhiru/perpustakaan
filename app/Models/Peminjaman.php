<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    public $timestamps = false;
    protected $fillable = [
        'id_buku',
        'id_anggota',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];

    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class, 'id_buku', 'id_buku');
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(Anggota::class, 'id_anggota', 'id_anggota');
    }
}
