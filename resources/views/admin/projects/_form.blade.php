@php $p = $project ?? null; @endphp

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
    <input type="text" name="title" value="{{ old('title', $p?->title) }}" required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Description *</label>
    <textarea name="description" rows="5" required
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">{{ old('description', $p?->description) }}</textarea>
    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
</div>

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tech Stack (comma-separated)</label>
        <input type="text" name="tech_stack" value="{{ old('tech_stack', $p ? implode(', ', $p->tech_stack ?? []) : '') }}"
            placeholder="Python, TensorFlow, Keras"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Priority Score (1–10) *</label>
        <input type="number" name="priority_score" min="1" max="10" required
            value="{{ old('priority_score', $p?->priority_score ?? 5) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">External Link (optional)</label>
    <input type="url" name="external_link" value="{{ old('external_link', $p?->external_link) }}"
        placeholder="https://github.com/..."
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    @error('external_link')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
</div>

<div class="flex items-center gap-2">
    <input type="hidden" name="visible" value="0">
    <input type="checkbox" name="visible" id="visible" value="1" class="rounded"
        {{ old('visible', $p?->visible ?? true) ? 'checked' : '' }}>
    <label for="visible" class="text-sm text-gray-700">Visible on portfolio</label>
</div>
