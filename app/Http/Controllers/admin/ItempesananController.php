<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Itempesanan;
use App\Models\pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItempesananController extends Controller
{
    // Method untuk menampilkan data menu
    public function index()
    {
        $itempesanan = Itempesanan::latest()->when(request()->q, function ($itempesanan) {
            $itempesanan = $itempesanan->where("jumlah", "like", "%" . request()->q . "%");
        })->paginate(10);

        return view("admin.itempesanan.index", compact("itempesanan"));
    }
    //method untuk tambah data
    public function create()
    {
        //kode untuk ambil data dari tabel relasi yaitu pelanggan
        $pesanan = Pesanan::latest()->get();
        $menus = Menu::latest()->get();
        return view('admin.itempesanan.create', compact('pesanan', 'menus'));
    }
    //method untuk kirim data dari inputan form ke tabel kategori ke database
    public function store(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'pesanan_id' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'subtotal' => 'required'

        ]);

        // Data input simpan ke dalam tabel
        $itempesanan = Itempesanan::create([
            'pesanan_id' => $request->pesanan_id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $request->subtotal,
        ]);

        // Kondisi apakah data berhasil disimpan atau tidak
        if ($itempesanan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.itempesanan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Item Pesanan']);
        } else {
            return redirect()->route('admin.itempesanan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Item Pesanan']);
        }
    }

    // method untuk  tampilkan data yang mau diubah
    public function edit($id)
    {
        $itempesanan = Itempesanan::findOrFail($id);
        $pesanan = Pesanan::latest()->get();
        $menus = Menu::latest()->get();
        return view('admin.itempesanan.edit', compact('itempesanan', 'pesanan', 'menus'));
    }

    //buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Itempesanan $itempesanan)
    {
        // Validasi inputan
        $this->validate($request, [
            'pesanan_id' => 'required',
            'menu_id' => 'required',
            'jumlah' => 'required',
            'harga_satuan' => 'required',
            'subtotal' => 'required'
        ]);

        $itempesanan = Itempesanan::findOrFail($itempesanan->id);
        $itempesanan->update([
            'pesanan_id' => $request->pesanan_id,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $request->subtotal,
        ]);

        // Kondisi jika berhasil atau tidak diubah datanya
        if ($itempesanan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.itempesanan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Item Pesanan']);
        } else {
            return redirect()->route('admin.itempesanan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Item Pesanan']);
        }
    }
    //method untuk hapus data
    public function destroy($id)
    {
        $itempesanan = Itempesanan::findOrFail($id);
        //hapus data
        $itempesanan->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($itempesanan) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);


        }

    }
}






