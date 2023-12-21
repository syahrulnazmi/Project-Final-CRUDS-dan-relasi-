<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pelanggan',
        'nomor_meja',
        'alamat',
        'no_tlp'
    ];
    public function pesanan()
    {
        return $this->hasOne(Pesanan::class);
    }
}

