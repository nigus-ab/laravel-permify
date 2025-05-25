@extends('layouts.app')

@section('title', 'Manage Roles')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Roles</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td class="border px-4 py-2">{{ $role->id }}</td>
                        <td class="border px-4 py-2">{{ $role->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('permify.roles.create') }}" class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Create New Role
        </a>
    </div>
@endsection
