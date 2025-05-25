@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <button id="theme-toggle" class="px-3 py-1 bg-gray-300 dark:bg-gray-700 rounded">
            Toggle Dark/Light
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Total Users</h2>
            <p class="text-3xl">{{ $totalUsers }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Total Roles</h2>
            <p class="text-3xl">{{ $totalRoles }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-2">Total Permissions</h2>
            <p class="text-3xl">{{ $totalPermissions }}</p>
        </div>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Recent Registered Users</h2>
        <ul class="list-disc pl-5">
            @foreach($recentUsers as $user)
                <li>{{ $user->name }} ({{ $user->email }}) - Registered at {{ $user->created_at->format('M d, Y') }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2 class="text-2xl font-semibold mb-4">Role Distribution</h2>
        <canvas id="roleChart" class="bg-white dark:bg-gray-800 p-4 rounded shadow" height="200"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('roleChart').getContext('2d');
    const roleChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($roleDistribution->keys()),
            datasets: [{
                label: 'Users per Role',
                data: @json($roleDistribution->values()),
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Dark/light toggle button
    const toggleBtn = document.getElementById('theme-toggle');
    toggleBtn.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        // Save preference
        if(document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    // Load saved theme
    if(localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
    }
</script>
@endsection
