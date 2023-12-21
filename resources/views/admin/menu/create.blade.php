@extends('layouts.app', ['title' => 'Tambah Menu - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg text-gray-700 font-semibold capitalize">TAMBAH MENU</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="image">GAMBAR</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white p-3" type="file"
                            name="image">
                        @error('image')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="name">NAMA MENU</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                            name="nama_menu" value="{{ old('nama_menu') }}" placeholder="Masukkan nama menu">
                        @error('nama_menu')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="deskripsi">DESKRIPSI</label>
                        <textarea name="deskripsi" rows="5">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="harga">HARGA</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                            name="harga" value="{{ old('harga') }}" placeholder="input harga">
                        @error('harga')
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
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('deskripsi');
</script>
@endsection