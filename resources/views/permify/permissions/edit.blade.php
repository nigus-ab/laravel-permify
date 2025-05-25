@extends('layouts.app')

@section('title', 'Edit Permission')

@section('content')
    <div class="container mx-auto p-6 max-w-lg">
        <h1 class="text-3xl font-bold mb-6">Edit Permission</h1>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('permify.permissions.update', $permission) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block mb-2 font-semibold">Permission Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $permission->name) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update Permission
            </button>
        </form>
    </div>
@endsection
