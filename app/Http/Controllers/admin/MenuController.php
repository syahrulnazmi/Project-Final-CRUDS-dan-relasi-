<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    // Method untuk menampilkan data menu
    public function index()
    {
        $menus = Menu::latest()->when(request()->q, function ($menus) {
            $menus = $menus->where("nama_menu", "like", "%" . request()->q . "%");
        })->paginate(10);

        return view("admin.menu.index", compact("menus"));
    }
    //method untuk panggil input data
    public function create()
    {
        return view('admin.menu.create');
    }

    //method untuk kirim data dari inputan form ke tabel kategori ke database
    public function store(Request $request)
    {
        // Validasi inputan
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1000000',
            'nama_menu' => 'required|unique:menus',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        // Kode untuk upload gambar
        $image = $request->file('image');
        //kita simpan di kode menu
        $image->storeAs('public/menus', $image->hashName());

        // Data input simpan ke dalam tabel
        $menu = Menu::create([
            'image' => $image->hashName(),
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga
        ]);

        // Kondisi
        if ($menu) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.menu.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Menu']);
        } else {
            return redirect()->route('admin.menu.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Menu']);
        }
    }
    //method untuk tampilkan data yang mau di ubah
    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    //buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Menu $menu)
    {
        // Validasi inputan
        $this->validate($request, [
            'nama_menu' => 'required|unique:menus',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        // Percabangan IF
        if ($request->file('image') == '') {
            $menu = Menu::findOrfail($menu->id);
            $menu->update([
                'nama_menu' => $request->nama_menu,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga
            ]);
        } else {
            // Hapus dulu gambar sebelumnya
            Storage::disk('local')->delete('public/menus/' . basename($menu->image));

            // Upload file gambar yang baru
            //kode untuk upload gambar
            $image = $request->file('image');
            //kita simpan di kode categories
            $image->storeAs('public/menus', $image->hashName());

            // Update data di tabel kategori dengan data baru
            //update data di tabel kategori dengan data baru
            $menu = Menu::findOrFail($menu->id);
            $menu->update([
                'nama_menu' => $request->nama_menu,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'image' => $image->hashName()
            ]);
        }
        // Kondisi jika berhasil atau tidak diubah datanya
        if ($menu) {
            // Redirect dengan tampilkan pesan
            return redirect()->route('admin.menu.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Menu']);
        } else {
            return redirect()->route('admin.menu.index')->with(['error' => 'Data Gagal Disimpan Kedalam Tabel Menu']);
        }
    }
    //method untuk hapus data
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        Storage::disk('local')->delete('public/menus/' . basename($menu->image));
        $menu->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($menu) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);


        }

    }
}

