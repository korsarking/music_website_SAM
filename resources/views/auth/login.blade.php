@extends('layout')

@section('main')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Use your email or username
                </p>
            </div>

            <form class="mt-8 space-y-6" action="{{ route('loginPost') }}" method="POST">
                @csrf

                <!-- Login (email or username) -->
                <div>
                    <label for="login" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email or Username
                    </label>
                    <input
                        id="login"
                        name="login"
                        type="text"
                        autocomplete="username"
                        required
                        value="{{ old('login') }}"
                        class="mt-1 rounded-lg block w-full px-4 py-3 border @error('login') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="john@example.com or john_doe"
                    >
                    @error('login')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Password
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                        class="mt-1 rounded-lg block w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror placeholder-gray-500 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember" class="ml-2 block text-sm text-gray-900 dark:text-gray-300">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Forgot your password?
                        </a>
                    </div>
                </div>

                <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200 cursor-pointer">
                    Sign in
                </button>

                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 cursor-pointer">
                        Register
                    </a>
                </p>
            </form>
        </div>
    </div>
@endsection