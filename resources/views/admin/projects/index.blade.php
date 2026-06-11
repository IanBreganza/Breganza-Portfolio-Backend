@extends('admin.layout')
@section('title', 'Projects')
@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded transition">+ New Project</a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b text-gray-500 uppercase text-xs tracking-wider">
            <tr>
                <th class="text-left px-5 py-3">Title</th>
                <th class="text-left px-5 py-3">Priority</th>
                <th class="text-left px-5 py-3">Visible</th>
                <th class="text-left px-5 py-3">Tech Stack</th>
                <th class="px-5 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-5 py-4 font-medium text-gray-800">{{ $project->title }}</td>
                <td class="px-5 py-4">
                    <span class="inline-block px-2 py-0.5 rounded text-xs font-bold {{ $project->priority_score >= 8 ? 'bg-green-100 text-green-700' : ($project->priority_score >= 5 ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                        {{ $project->priority_score }}
                    </span>
                </td>
                <td class="px-5 py-4">
                    <span class="{{ $project->visible ? 'text-green-600' : 'text-gray-400' }}">{{ $project->visible ? '✓ Yes' : '✗ No' }}</span>
                </td>
                <td class="px-5 py-4 text-gray-500">{{ implode(', ', $project->tech_stack ?? []) }}</td>
                <td class="px-5 py-4 text-right space-x-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline" onsubmit="return confirm('Delete this project?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-5 py-8 text-center text-gray-400">No projects yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
