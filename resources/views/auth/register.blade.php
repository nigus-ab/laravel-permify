@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Create your account</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block mb-2 font-semibold">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                class="w-full p-3 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>

        <div>
            <label for="email" class="block mb-2 font-semibold">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                class="w-full p-3 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>

        <div>
            <label for="password" class="block mb-2 font-semibold">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full p-3 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>

        <div>
            <label for="password_confirmation" class="block mb-2 font-semibold">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                class="w-full p-3 rounded border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100">
        </div>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded font-semibold transition">
            Register
        </button>
    </form>

    <p class="mt-6 text-center">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login here</a>
    </p>
</div>
@endsection
