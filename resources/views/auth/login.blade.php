@extends('layouts.authenticate')

@section('content')
<div class="max-w-md mx-auto m-8 font-baloo">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <div class="flex items-center justify-center mb-5">
            <img src="{{ asset('/images/akuro_user.png') }}" class="rounded-full mx-5" width="20%">
            <div class="text-center text-xl font-bold ">{{ __(' Đăng nhập tài khoản') }}</div>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Địa chỉ Email:') }}</label>
                <div class="mt-1">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Mật khẩu:') }}</label>
                <div class="mt-1">
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('password')
                        <span class="text-sm text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">{{ __('Ghi nhớ') }}</label>
                </div>

                <div class="text-sm">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">{{ __('Quên mật khẩu?') }}</a>
                    @endif
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Đăng nhập') }}
                </button>
            </div>
        </form>
    </div>
</div>


@endsection
