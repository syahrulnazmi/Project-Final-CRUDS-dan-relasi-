@extends('layouts.app', ['title' => 'Edit Data Pelanggan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">EDIT DATA PELANGGAN</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 gap-6 mt-4">

                    <div>
                        <label class="text-gray-700" for="nama_pelanggan">NAMA PELANGGAN</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Nama Pelanggan">
                        @error('nama_pelanggan')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="nomor_meja">NO. MEJA</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                            name="nomor_meja" value="{{ old('nomor_meja') }}" placeholder="input nomor meja pelanggan">
                        @error('nomor_meja')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="alamat">ALAMAT</label>
                        <textarea name="alamat" rows="5">{{ old('alamat') }}</textarea>
                        @error('alamat')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="no_tlp">NO. TLP</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                            name="no_tlp" value="{{ old('no_tlp') }}" placeholder="Input nomor telepon Tambahan">
                        @error('no_tlp')
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
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('alamat');
</script>
@endsection