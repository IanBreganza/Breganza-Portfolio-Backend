@extends('admin.layout')
@section('title', 'Experience')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Experience</h1>
    <a href="{{ route('admin.experiences.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded transition">+ New Entry</a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b text-gray-500 uppercase text-xs tracking-wider">
            <tr>
                <th class="text-left px-5 py-3">Order</th>
                <th class="text-left px-5 py-3">Role</th>
                <th class="text-left px-5 py-3">Company</th>
                <th class="text-left px-5 py-3">Date Range</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($experiences as $exp)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-5 py-4 text-gray-400">{{ $exp->display_order }}</td>
                <td class="px-5 py-4 font-medium text-gray-800">{{ $exp->role }}</td>
                <td class="px-5 py-4 text-gray-600">{{ $exp->company }}</td>
                <td class="px-5 py-4 text-gray-500">{{ $exp->date_range }}</td>
                <td class="px-5 py-4 text-right space-x-2">
                    <a href="{{ route('admin.experiences.edit', $exp) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.experiences.destroy', $exp) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-8 text-center text-gray-400">No experience entries yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
