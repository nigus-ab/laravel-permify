@extends('layouts.app')

@section('content')
    <h2>Roles</h2>
    <ul>
        @foreach ($roles as $role)
            <li>{{ $role->name }} ({{ $role->permissions->count() }} permissions)</li>
        @endforeach
    </ul>
@endsection
