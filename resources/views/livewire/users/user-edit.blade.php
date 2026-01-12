<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Edit Users') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Edit your Users') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <a href="{{ route('users.index') }}"
        class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">Back</a>
    <div class="w-full overflow-x-auto">

        <div class="w-full max-w-xs">
            <form class="mt-6 space-y-6 px-6" wire:submit='submit'>
                <flux:input wire:model='name' label="Name" placeholder="Name" />
                <flux:input wire:model='email' label="Email" placeholder="your Email" />
                <flux:input type="password" wire:model='password' label="Password" placeholder="Password" />
                <flux:input type="password" wire:model='confirm_password' label="Confirm Password"
                    placeholder="Confirm Password" />
                <flux:checkbox.group wire:model="roles" label="Roles">
                    @foreach ($allRoles as $role)
                        <flux:checkbox label="{{ $role->name }}" value="{{ $role->name }}" />
                    @endforeach
                </flux:checkbox.group>

                <flux:button type="submit" variant="primary">Create</flux:submit>
            </form>
        </div>

    </div>
</div>
