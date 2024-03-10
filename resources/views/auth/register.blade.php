@extends('layouts.authenticate')

@section('content')

<div class="max-w-md mx-auto mt-8 font-baloo">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 border border-gray-200">
        <div class="flex items-center justify-center mb-5">
            <img src="{{ asset('/images/akuro_user.png') }}" class="rounded-full mx-5" width="20%">
            <div class="text-center text-xl font-bold ">{{ __(' Đăng ký tài khoản') }}</div>
        </div>
        
    
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Tên người dùng: ') }}</label>
                <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="text-red-500 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Địa chỉ email') }}</label>
                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="text-red-500 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Mật khẩu') }}</label>
                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="text-red-500 text-sm" role="alert">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nhập lại mật khẩu') }}</label>
                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline">{{ __('Đăng ký') }}</button>
            </div>
            <p class="text-right mt-5">Đã có tài khoản ? <u><a href="{{ route('login') }}">{{ __('Đăng nhập') }}</a></u></p>
        </form>
    </div>
</div>

@endsection
