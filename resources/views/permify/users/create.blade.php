@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Create New User</h1>

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('permify.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block mb-2 font-semibold">Name</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2" required value="{{ old('name') }}">
        </div>

        <div>
            <label for="email" class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2" required value="{{ old('email') }}">
        </div>

        <div>
            <label for="password" class="block mb-2 font-semibold">Password</label>
            <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label for="password_confirmation" class="block mb-2 font-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-2 font-semibold">Assign Roles</label>
            @foreach($roles as $role)
            <label class="inline-flex items-center mr-4">
                <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-checkbox">
                <span class="ml-2">{{ $role->name }}</span>
            </label>
            @endforeach
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Save User
        </button>
    </form>
</div>
@endsection
