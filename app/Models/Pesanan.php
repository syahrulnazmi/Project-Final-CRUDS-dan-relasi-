<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pelanggan_id',
        'tanggal_pesan',
        'status',
        'total_harga',
    ];
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }
    public function itemsPesanan()
    {
        return $this->hasMany(ItemPesanan::class, 'pesanan_id');
    }
}

