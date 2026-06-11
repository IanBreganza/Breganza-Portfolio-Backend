@php $s = $skill ?? null; @endphp

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
        <input type="text" name="name" value="{{ old('name', $s?->name) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
        <input type="text" name="category" value="{{ old('category', $s?->category) }}" required
            placeholder="e.g. Languages, ML & AI"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Icon (optional)</label>
        <input type="text" name="icon" value="{{ old('icon', $s?->icon) }}"
            placeholder="e.g. devicon-python-plain"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
        <input type="number" name="display_order" min="0" value="{{ old('display_order', $s?->display_order ?? 0) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>
