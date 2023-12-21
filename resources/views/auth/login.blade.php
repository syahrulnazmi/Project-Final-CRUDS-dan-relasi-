@extends('layouts.auth', ['title' => 'Login Aplikasi'])

@section('content')
<style>
    body {
        background-image: url('https://wallpaperaccess.com/full/9328792.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        font-family: 'Calibri', sans-serif;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-form {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }
</style>

<div class="login-container">
    <div class="login-form p-6 bg-gray shadow-md rounded-md">

        <div class="flex justify-center items-center">
            <span class="text-gray-700 font-semibold text-2xl">LOGIN USER </span>
        </div>
        @if (session('status'))
        <div class="bg-green-500 p-3 rounded-md shadow-sm mt-3">
            {{ session('status') }}
        </div>
        @endif
        <form class="mt-4" action="{{ route('login') }}" method="POST">
            @csrf
            <label class="block">
                <span class="text-gray-700 text-sm">Email</span>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-input mt-1 block w-full rounded-md focus:outline-none" placeholder="Alamat Email">
                @error('email')
                <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                    <div class="px-4 py-2">
                        <p class="text-gray-600 text-sm">{{ $message }}</p>
                    </div>
                </div>
                @enderror
            </label>
            <label class="block mt-3">
                <span class="text-gray-700 text-sm">Password</span>
                <input type="password" name="password" class="form-input mt-1 block w-full rounded-md"
                    placeholder="Password">
                @error('password')
                <div class="inline-flex max-w-sm w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                    <div class="px-4 py-2">
                        <p class="text-gray-600 text-sm">{{ $message }}</p>
                    </div>
                </div>
                @enderror
            </label>
            <div class="flex justify-between items-center mt-4">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-indigo-600">
                        <span class="mx-2 text-gray-600 text-sm">Ingatkan Saya</span>
                    </label>
                </div>
                <div>
                    <a class="block text-sm font-medium text-indigo-700 hover:underline" href="/forgot-password">Lupa
                        Password?</a>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit"
                    class="py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500 focus:outline-none">
                    LOGIN
                </button>
            </div>
        </form>
    </div>
</div>
@endsection