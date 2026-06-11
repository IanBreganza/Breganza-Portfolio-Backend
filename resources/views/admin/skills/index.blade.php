@extends('admin.layout')
@section('title', 'Skills')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Skills</h1>
    <a href="{{ route('admin.skills.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded transition">+ New Skill</a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b text-gray-500 uppercase text-xs tracking-wider">
            <tr>
                <th class="text-left px-5 py-3">Name</th>
                <th class="text-left px-5 py-3">Category</th>
                <th class="text-left px-5 py-3">Order</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($skills as $skill)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-5 py-4 font-medium text-gray-800">{{ $skill->name }}</td>
                <td class="px-5 py-4 text-gray-500">{{ $skill->category }}</td>
                <td class="px-5 py-4 text-gray-400">{{ $skill->display_order }}</td>
                <td class="px-5 py-4 text-right space-x-2">
                    <a href="{{ route('admin.skills.edit', $skill) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="px-5 py-8 text-center text-gray-400">No skills yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
