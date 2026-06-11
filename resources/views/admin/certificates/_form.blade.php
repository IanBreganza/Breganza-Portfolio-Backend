@php $c = $certificate ?? null; @endphp

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
        <input type="text" name="name" value="{{ old('name', $c?->name) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Organization *</label>
        <input type="text" name="organization" value="{{ old('organization', $c?->organization) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div class="grid grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Date Issued *</label>
        <input type="date" name="date_issued" value="{{ old('date_issued', $c?->date_issued?->format('Y-m-d')) }}" required
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Expiration (optional)</label>
        <input type="date" name="expiration" value="{{ old('expiration', $c?->expiration?->format('Y-m-d')) }}"
            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
    </div>
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Credential URL (optional)</label>
    <input type="url" name="credential_url" value="{{ old('credential_url', $c?->credential_url) }}"
        placeholder="https://..."
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
</div>

<div>
    <label class="block text-sm font-medium text-gray-700 mb-1">Thumbnail URL (optional)</label>
    <input type="text" name="thumbnail" value="{{ old('thumbnail', $c?->thumbnail) }}"
        placeholder="https://..."
        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
</div>

<div class="flex items-center gap-2">
    <input type="hidden" name="visible" value="0">
    <input type="checkbox" name="visible" id="visible" value="1" class="rounded"
        {{ old('visible', $c?->visible ?? true) ? 'checked' : '' }}>
    <label for="visible" class="text-sm text-gray-700">Visible on portfolio</label>
</div>
