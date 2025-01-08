<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImunisasiModel extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'imunisasi'; // Nama tabel (sesuaikan dengan nama tabel di database)

    // Menentukan atribut yang bisa diisi secara mass-assignment
    protected $fillable = [
        'warga_id', 'jenis_imunisasi', 'tanggal_imunisasi'
    ];

    // Relasi kebalikannya: setiap imunisasi dimiliki oleh satu warga
    public function warga()
    {
        return $this->belongsTo(WargaModel::class); // Menghubungkan dengan warga
    }
}
