<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Create Branch</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">

        <div>
            <label class="block text-sm font-medium">Branch Name</label>
            <input type="text" wire:model.defer="name" class="input w-full">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Location</label>
            <input type="text" wire:model.defer="location" class="input w-full">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" wire:model="is_main">
            <label class="text-sm">Set as Main Branch</label>
        </div>

        <button type="submit" class="btn btn-primary w-full">
            Create Branch
        </button>

    </form>
</div>
