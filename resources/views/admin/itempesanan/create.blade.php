@extends('layouts.app', ['title' => 'Tambah Item Pesanan - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">TAMBAH ITEM PESANAN</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.itempesanan.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="pesanan_id">PESANAN</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none"
                            name="pesanan_id">
                            @foreach($pesanan as $ps)
                            <option class="py-1" value="{{ $ps->id }}">{{ $ps->tanggal_pesan}}</option>
                            @endforeach
                        </select>
                        @error('pesanan_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="menu_id">MENU</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none"
                            name="menu_id">
                            @foreach($menus as $mn)
                            <option class="py-1" value="{{ $mn->id }}">{{ $mn->nama_menu }}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="jumlah">jumlah</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                            name="jumlah" value="{{ old('jumlah') }}" placeholder="">
                        @error('jumlah')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="harga_satuan">HARGA SATUAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="harga_satuan" value="{{ old('harga_satuan') }}" placeholder="masukkan harga satuan">
                        @error('harga_satuan')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="subtotal">SUBTOTAL</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="subtotal" value="{{ old('total_harga') }}" placeholder="">
                        @error('subtotal')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="flex justify-start mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</main>

@endsection