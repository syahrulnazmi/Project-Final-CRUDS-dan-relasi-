@extends('layouts.app', ['title' => 'Dashboard - Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="mt-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- User -->
                <div class="w-full bg-white rounded-md overflow-hidden shadow-lg">
                    <div class="p-4 bg-indigo-600 text-white">
                        <div class="flex items-center">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <div class="ml-3">
                                <p class="text-sm font-semibold">USER</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menu Makanan -->

                <a href="{{ route('admin.menu.index') }}">
                    <div class="w-full bg-white rounded-md overflow-hidden shadow-lg">
                        <div class="p-4 bg-yellow-500 text-white">
                            <div class="flex items-center">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 3h12a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2zm0 0l8 4 8-4M6 10h12M6 14h12M6 18h12">
                                    </path>
                                </svg>
                                <div class="ml-4">
                                    <p class="text-sm font-semibold">DAFTAR MENU</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pelanggan -->
                    <a href="{{ route('admin.pelanggan.index') }}">
                        <div class="w-full bg-white rounded-md overflow-hidden shadow-lg">
                            <div class="p-4 bg-green-600 text-white">
                                <div class="flex items-center">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 9H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-5m-2-3V5a2 2 0 00-2-2h0a2 2 0 00-2 2v1m0 3V5a2 2 0 012-2h0a2 2 0 012 2v4m2 2v5m0-5h5m-5-3h5m-5-3h5m-5 3h5">
                                        </path>
                                    </svg>
                                    <div class="ml-3">
                                        <p class="text-sm font-semibold">PELANGGAN</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Pesanan -->
                        <a href="{{ route('admin.pesanan.index') }}">
                            <div class="w-full bg-white rounded-md overflow-hidden shadow-lg">
                                <div class="p-4 bg-red-600 text-white">
                                    <div class="flex items-center">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3zm14 0a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H5a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4h6">
                                            </path>
                                        </svg>
                                        <div class="ml-3">
                                            <p class="text-sm font-semibold">PESANAN</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Item Pemesanan -->
                            <a href="{{ route('admin.itempesanan.index') }}">
                                <div class="w-full bg-white rounded-md overflow-hidden shadow-lg">
                                    <div class="p-4 bg-purple-500 text-white">
                                        <div class="flex items-center">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l3.5-3.5m9 0L20 16m0 0l-3.5 3.5m3.5-3.5l-7-7-7 7M6 4h6m4 0h2a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z">
                                                </path>
                                            </svg>
                                            <div class="ml-3">
                                                <p class="text-sm font-semibold">ITEM PEMESANAN</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
        </div>
    </div>
</main>
@endsection