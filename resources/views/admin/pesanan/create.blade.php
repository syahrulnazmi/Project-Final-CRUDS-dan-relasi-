@extends('layouts.app', ['title' => 'Tambah Pesanan - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">TAMBAH DATA PESANAN</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.pesanan.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="pelanggan_id">PELANGGAN</label>
                        <select class="w-full border bg-gray-200 focus:bg-white rounded px-3 py-2 outline-none"
                            name="pelanggan_id">
                            @foreach($pelanggans as $pl)
                            <option class="py-1" value="{{ $pl->id }}">{{ $pl->nama_pelanggan }}</option>
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="tanggal_pesan">TANGGAL PEMESANAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="tanggal_pesan" value="{{ old('tanggal_pesan') }}" placeholder="">
                        @error('tanggal_pesan')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="status">STATUS</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="status" value="{{ old('status') }}" placeholder="masukkan status">
                        @error('status')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="total_harga">TOTAL HARGA</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="total_harga" value="{{ old('total_harga') }}" placeholder="status pesanan">
                        @error('total_harga')
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