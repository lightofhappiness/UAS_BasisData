<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StuntingModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id', 'tinggi_badan', 'berat_badan', 'usia', 'status_stunting'
    ];

    // Relasi ke warga
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}

    