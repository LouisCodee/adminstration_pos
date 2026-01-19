<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 dark:bg-gray-950">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-10 text-center sm:text-left">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ __('Create User') }}
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                {{ __('Add a new user to the system') }}
            </p>

            <div class="mt-6">
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-lg
                          border border-gray-300 text-gray-700 bg-white
                          hover:bg-gray-50 hover:text-gray-900
                          dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300
                          dark:hover:bg-gray-700 dark:hover:text-white transition-colors">
                    ← {{ __('Back to Users') }}
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="px-6 py-8 sm:p-10">

                <!-- Form Errors -->
                @if ($errors->any())
                    <div
                        class="mb-8 p-4 rounded-lg bg-red-50 border border-red-200 dark:bg-red-900/30 dark:border-red-800/50">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-red-500 dark:text-red-400 mt-0.5 flex-shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01M12 3a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                                    {{ __('Please fix the following errors:') }}
                                </h3>
                                <ul class="mt-2 text-sm text-red-700 dark:text-red-300 list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Form -->
                <form wire:submit.prevent="submit" class="space-y-8">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Name') }}
                        </label>
                        <input id="name" type="text" wire:model.live.debounce.500ms="name"
                            class="block w-full rounded-lg border-gray-300 px-4 py-3.5 text-base
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="{{ __('Enter full name') }}" required />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Email') }}
                        </label>
                        <input id="email" type="email" wire:model.live.debounce.500ms="email"
                            class="block w-full rounded-lg border-gray-300 px-4 py-3.5 text-base
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="{{ __('user@example.com') }}" required />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Password') }}
                        </label>
                        <input id="password" type="password" wire:model.live.debounce.500ms="password"
                            class="block w-full rounded-lg border-gray-300 px-4 py-3.5 text-base
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="••••••••" required />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="confirm_password"
                            class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ __('Confirm Password') }}
                        </label>
                        <input id="confirm_password" type="password" wire:model.live.debounce.500ms="confirm_password"
                            class="block w-full rounded-lg border-gray-300 px-4 py-3.5 text-base
                   shadow-sm focus:border-indigo-500 focus:ring-indigo-500
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                            placeholder="••••••••" required />
                    </div>

                    <!-- Roles -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-3">
                            {{ __('Roles') }}
                        </label>
                        <div class="space-y-4">
                            @foreach ($allRoles as $role)
                                <label class="flex items-center">
                                    <input type="checkbox" wire:model.live="roles" value="{{ $role->name }}"
                                        class="h-5 w-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600" />
                                    <span class="ml-3 text-base text-gray-700 dark:text-gray-300">
                                        {{ $role->name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Business -->
                    <div>
                        <label class="block text-base font-medium text-gray-700 dark:text-gray-300 mb-3">
                            {{ __('Business') }}
                        </label>
                        <div class="space-y-4">
                            @foreach ($allBusinesses as $business)
                                <label class="flex items-center">
                                    <input type="radio" wire:model.live="business_id" value="{{ $business->id }}"
                                        name="business_id"
                                        class="h-5 w-5 border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600" />
                                    <span class="ml-3 text-base text-gray-700 dark:text-gray-300">
                                        {{ $business->name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full px-8 py-4 bg-indigo-600 text-white text-base font-semibold rounded-lg
                   hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                   transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit">
                                {{ __('Create User') }}
                            </span>
                            <span wire:loading wire:target="submit">
                                {{ __('Creating...') }}
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
