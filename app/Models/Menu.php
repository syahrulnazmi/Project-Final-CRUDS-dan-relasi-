<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// import
use Illuminate\Database\Eloquent\Casts\Attribute;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama_menu',
        'deskripsi',
        'harga'
    ];

    // method untuk tambah fitur accessor
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('/storage/menus/' . $value)
        );
    }
    //method untuk relasional tabel
    public function itemPesanan()
    {
        return $this->hasMany(ItemPesanan::class, 'menu_id');
    } //jenis relasi tabel one to many

}
