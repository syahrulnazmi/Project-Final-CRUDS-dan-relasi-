<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesananController extends Controller
{
    // Method untuk menampilkan data menu
    public function index()
    {
        $pesanan = Pesanan::latest()->when(request()->q, function ($pesanan) {
            $pesanan = $pesanan->where("tanggal_pesan", "like", "%" . request()->q . "%");
        })->paginate(10);

        return view("admin.pesanan.index", compact("pesanan"));
    }
    //method untuk tambah data
    public function create()
    {
        //kode untuk ambil data dari tabel relasi yaitu pelanggan
        $pelanggans = Pelanggan::latest()->get();
        return view('admin.pesanan.create', compact("pelanggans"));
    }
    //method untuk kirim data dari inputan form ke tabel kategori ke database
    public function store(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'pelanggan_id' => 'required',
            'tanggal_pesan' => 'required',
            'status' => 'required',
            'total_harga' => 'required'

        ]);

        // Data input simpan ke dalam tabel
        $pesanan = Pesanan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_pesan' => $request->tanggal_pesan,
            'status' => $request->status,
            'total_harga' => $request->total_harga
        ]);

        // Kondisi apakah data berhasil disimpan atau tidak
        if ($pesanan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.pesanan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Pesanan']);
        } else {
            return redirect()->route('admin.pesanan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Pesanan']);
        }
    }

    // method untuk  tampilkan data yang mau diubah
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pelanggans = Pelanggan::latest()->get();
        return view('admin.pesanan.edit', compact('pesanan', 'pelanggans'));
    }

    //buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Pesanan $pesanan)
    {
        // Validasi inputan
        $this->validate($request, [
            'pelanggan_id' => 'required',
            'tanggal_pesan' => 'required',
            'status' => 'required',
            'total_harga' => 'required'
        ]);

        $pesanan = Pesanan::findOrFail($pesanan->id);
        $pesanan->update([
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_pesan' => $request->tanggal_pesan,
            'status' => $request->status,
            'total_harga' => $request->total_harga
        ]);

        // Kondisi jika berhasil atau tidak diubah datanya
        if ($pesanan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.pesanan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Pesanan']);
        } else {
            return redirect()->route('admin.pesanan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Pesanan']);
        }
    }
    //method untuk hapus data
    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        //hapus data
        $pesanan->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($pesanan) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);


        }

    }
}


