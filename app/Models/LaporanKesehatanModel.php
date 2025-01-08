<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKesehatanModel extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'laporan_kesehatan'; // Nama tabel (sesuaikan dengan nama tabel di database)

    // Menentukan atribut yang bisa diisi secara mass-assignment
    protected $fillable = [
        'warga_id', 'tanggal_laporan', 'hasil_tes'
    ];

    // Relasi kebalikannya: setiap laporan kesehatan dimiliki oleh satu warga
    public function warga()
    {
        return $this->belongsTo(Warga::class); // Menghubungkan dengan warga
    }
}
