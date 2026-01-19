<div class="space-y-8 p-6 lg:p-8">
    <!-- Header + Create Button -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ __('Businesses') }}
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                {{ __('Manage all businesses in the system') }}
            </p>
        </div>

        @can('create_business')
            <a href="{{ route('business.create') }}"
                class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold rounded-lg
                      bg-indigo-600 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2
                      focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                {{ __('Create Business') }}
            </a>
        @endcan
    </div>

    <!-- Messages -->
    @if (session('success'))
        <div
            class="p-4 rounded-lg bg-green-50 border border-green-200 text-green-800 dark:bg-green-900/30 dark:border-green-800/50 dark:text-green-200">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div
            class="p-4 rounded-lg bg-red-50 border border-red-200 text-red-800 dark:bg-red-900/30 dark:border-red-800/50 dark:text-red-200">
            {{ session('error') }}
        </div>
    @endif

    <!-- Table Card -->
    <div
        class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800/80">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50/80 dark:bg-gray-900/50 backdrop-blur-sm">
                    <tr>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                            ID
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                            Currency
                        </th>
                        <th scope="col"
                            class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800">
                    @forelse ($business as $bus)
                        <tr class="group hover:bg-gray-50/70 dark:hover:bg-gray-700/40 transition-colors duration-150">
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ $bus->id }}
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ $bus->name }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300 uppercase">
                                {{ $bus->currency }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                <div
                                    class="flex items-center justify-end gap-4 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <!-- View -->
                                    <a href="{{ route('business.show', $bus) }}"
                                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group relative"
                                        title="View business details">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                    <!-- Edit -->
                                    <a href="{{ route('business.edit', $bus) }}"
                                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group relative"
                                        title="Edit business">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <button type="button" wire:click="delete({{ $bus->id }})"
                                        wire:confirm="Are you sure you want to delete {{ addslashes($bus->name) }}?"
                                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors group relative"
                                        title="Delete business">
                                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500 dark:text-gray-400">
                                    <svg class="w-16 h-16 mb-4 opacity-40" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h-4m-6 0H5" />
                                    </svg>
                                    <p class="text-lg font-medium text-gray-700 dark:text-gray-200">
                                        No businesses found
                                    </p>
                                    <p class="mt-1 text-sm">
                                        Get started by creating a new business.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
