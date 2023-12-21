<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itempesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'pesanan_id',
        'menu_id',
        'jumlah',
        'harga_satuan',
        'subtotal'
    ];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

