@php $e = $experience ?? null; @endphp

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Role *</label>
        <input type="text" name="role" value="{{ old('role', $e?->role) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Company *</label>
        <input type="text" name="company" value="{{ old('company', $e?->company) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
        <input type="text" name="location" value="{{ old('location', $e?->location) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Date Range *</label>
        <input type="text" name="date_range" value="{{ old('date_range', $e?->date_range) }}" required
            placeholder="e.g. Jan 2025 – Mar 2025"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Responsibilities (one per line)</label>
    <textarea name="responsibilities" rows="6"
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">{{ old('responsibilities', $e ? implode("\n", $e->responsibilities ?? []) : '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Display Order</label>
    <input type="number" name="display_order" min="0" value="{{ old('display_order', $e?->display_order ?? 0) }}"
        class="w-32 border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
</div>
