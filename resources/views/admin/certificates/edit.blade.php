@extends('admin.layout')
@section('title', 'Edit Certificate')
@section('content')
<div class="mb-6">
    <a href="{{ route('admin.certificates.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Back</a>
    <h1 class="text-2xl font-bold text-gray-800 mt-1">Edit: {{ $certificate->name }}</h1>
</div>
<form method="POST" action="{{ route('admin.certificates.update', $certificate) }}" class="bg-white rounded-xl shadow p-6 space-y-5">
    @csrf @method('PATCH')
    @include('admin.certificates._form', ['certificate' => $certificate])
    <div class="pt-2">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded transition">Update</button>
    </div>
</form>
@endsection
