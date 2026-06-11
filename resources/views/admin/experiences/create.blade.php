@extends('admin.layout')
@section('title', 'New Experience')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.experiences.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Back</a>
    <h1 class="text-2xl font-bold text-gray-800 mt-1">New Experience Entry</h1>
</div>
<form method="POST" action="{{ route('admin.experiences.store') }}" class="bg-white rounded-xl shadow p-6 space-y-5">
    @csrf
    @include('admin.experiences._form')
    <div class="pt-2">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-medium px-6 py-2 rounded transition">Create</button>
    </div>
</form>
@endsection
