@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full border rounded px-3 py-2">
            @error('email')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full border rounded px-3 py-2">
            @error('password')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</button>
    </form>

    <p class="mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600">Register</a></p>
</div>
@endsection
