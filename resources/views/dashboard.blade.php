
@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-2">Total Users</h2>
            <p class="text-3xl font-bold text-blue-500">{{$users_count}}</p>
        </div>
    </div>
</div>

@endsection

