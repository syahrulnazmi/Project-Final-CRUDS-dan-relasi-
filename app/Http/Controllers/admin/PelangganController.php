<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    // Method untuk menampilkan data menu
    public function index()
    {
        $pelanggans = Pelanggan::latest()->when(request()->q, function ($pelanggans) {
            $pelanggans = $pelanggans->where("nama_pelanggan", "like", "%" . request()->q . "%");
        })->paginate(10);

        return view("admin.pelanggan.index", compact("pelanggans"));
    }
    //method untuk panggil input data
    public function create()
    {
        return view('admin.pelanggan.create');
    }
    //method untuk kirim data dari inputan form ke tabel kategori ke database
    public function store(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'nomor_meja' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|min:12'

        ]);

        // Data input simpan ke dalam tabel
        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_meja' => $request->nomor_meja,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp
        ]);

        // Kondisi apakah data berhasil disimpan atau tidak
        if ($pelanggan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.pelanggan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Pelanggan']);
        } else {
            return redirect()->route('admin.pelanggan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Pelanggan']);
        }
    }

    // method untuk  tampilkan data yang mau diubah
    public function edit(pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    //buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // Validasi inputan
        $this->validate($request, [
            'nama_pelanggan' => 'required',
            'nomor_meja' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|min:12'
        ]);

        $pelanggan = Pelanggan::findOrFail($pelanggan->id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_meja' => $request->nomor_meja,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp
        ]);

        // Kondisi jika berhasil atau tidak diubah datanya
        if ($pelanggan) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.pelanggan.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Pelanggan']);
        } else {
            return redirect()->route('admin.pelanggan.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Pelanggan']);
        }
    }
    //method untuk hapus data
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        //hapus data
        $pelanggan->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($pelanggan) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);


        }

    }
}

