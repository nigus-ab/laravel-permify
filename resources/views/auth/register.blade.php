@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Register</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="w-full border rounded px-3 py-2">
            @error('name')
                <p class="text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
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
            <label for="password_confirmation" class="block font-semibold mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Register</button>
    </form>

    <p class="mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
</div>
@endsection
