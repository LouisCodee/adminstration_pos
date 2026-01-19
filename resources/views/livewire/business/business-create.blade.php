<div>
    {{-- Page header --}}
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create Business') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Create all your Business') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    {{-- Back button --}}
    <a href="{{ route('business.index') }}"
        class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Back
    </a>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="mt-4 space-y-2">
            @foreach ($errors->all() as $error)
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <!-- Heroicon: Exclamation Circle -->
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M12 3a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800">{{ $error }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif



    <div class="w-full overflow-x-auto mt-6">
        <div class="w-full max-w-xs">
            <form class="mt-6 space-y-6 px-6" wire:submit.prevent="submit">

                {{-- Name --}}
                <flux:input wire:model="name" label="Name" placeholder="Name" />

                {{-- Email --}}


                {{-- Roles --}}
                {{-- <flux:checkbox.group wire:model="roles" label="Roles">
                    @foreach ($allRoles as $role)
                        <flux:checkbox label="{{ $role->name }}" value="{{ $role->name }}" />
                    @endforeach
                </flux:checkbox.group> --}}

                {{-- Submit --}}
                <flux:button type="submit" variant="primary">Create Business</flux:button>
            </form>
        </div>
    </div>
</div>
