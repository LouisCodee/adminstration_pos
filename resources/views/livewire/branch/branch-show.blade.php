<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('Business Details') }}
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                {{ __('Detailed information about this business') }}
            </p>

            <div class="mt-6">
                <a href="{{ route('business.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-lg
                          border border-gray-300 text-gray-700 bg-white
                          hover:bg-gray-50 hover:text-gray-900
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          transition-colors
                          dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300
                          dark:hover:bg-gray-700 dark:hover:text-white">
                    ← {{ __('Back to Business') }}
                </a>
            </div>
        </div>

        <!-- Main Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 sm:p-8">
                <!-- User Info Header -->
                <div class="flex items-center gap-5 mb-8 pb-6 border-b border-gray-100 dark:border-gray-700">
                    <!-- Avatar / Initials -->
                    <div
                        class="h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl font-semibold">
                        {{ strtoupper($business->name[0] ?? '?') }}
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $business->name }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ $business->email }}
                        </p>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Name -->
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Full Name
                        </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                            {{ $business->name }}
                        </dd>
                    </div>

                    <!-- Email -->
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Email Address
                        </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-gray-100 break-all">
                            {{ $business->email }}
                        </dd>
                    </div>

                    <!-- Optional: Add more fields as needed -->
                    @if ($business->created_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                Created At
                            </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                                {{ $business->created_at->format('d M Y • H:i') }}
                            </dd>
                        </div>
                    @endif

                    @if ($business->updated_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                Last Updated
                            </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                                {{ $business->updated_at->format('d M Y • H:i') }}
                            </dd>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Footer with Actions -->
            <div
                class="px-6 py-5 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex flex-wrap gap-4 justify-end">
                <a href="{{ route('business.edit', $business) }}"
                    class="px-6 py-2.5 rounded-lg text-sm font-medium
                          bg-indigo-600 text-white hover:bg-indigo-700
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          transition-colors">
                    {{ __('Edit Business') }}
                </a>
            </div>
        </div>
    </div>
</div>
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                {{ __('Business Details') }}
            </h1>
            <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">
                {{ __('Detailed information about this business') }}
            </p>

            <div class="mt-6">
                <a href="{{ route('business.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium rounded-lg
                          border border-gray-300 text-gray-700 bg-white
                          hover:bg-gray-50 hover:text-gray-900
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          transition-colors
                          dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300
                          dark:hover:bg-gray-700 dark:hover:text-white">
                    ← {{ __('Back to Business') }}
                </a>
            </div>
        </div>

        <!-- Main Card -->
        <div
            class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6 sm:p-8">
                <!-- User Info Header -->
                <div class="flex items-center gap-5 mb-8 pb-6 border-b border-gray-100 dark:border-gray-700">
                    <!-- Avatar / Initials -->
                    <div
                        class="h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900/60 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-2xl font-semibold">
                        {{ strtoupper($business->name[0] ?? '?') }}
                    </div>

                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                            {{ $business->name }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            {{ $business->email }}
                        </p>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Name -->
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Full Name
                        </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                            {{ $business->name }}
                        </dd>
                    </div>

                    <!-- Email -->
                    <div>
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                            Email Address
                        </dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-gray-100 break-all">
                            {{ $business->email }}
                        </dd>
                    </div>

                    <!-- Optional: Add more fields as needed -->
                    @if ($business->created_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                Created At
                            </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                                {{ $business->created_at->format('d M Y • H:i') }}
                            </dd>
                        </div>
                    @endif

                    @if ($business->updated_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">
                                Last Updated
                            </dt>
                            <dd class="text-base font-medium text-gray-900 dark:text-gray-100">
                                {{ $business->updated_at->format('d M Y • H:i') }}
                            </dd>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Card Footer with Actions -->
            <div
                class="px-6 py-5 bg-gray-50 dark:bg-gray-900/50 border-t border-gray-200 dark:border-gray-700 flex flex-wrap gap-4 justify-end">
                <a href="{{ route('business.edit', $business) }}"
                    class="px-6 py-2.5 rounded-lg text-sm font-medium
                          bg-indigo-600 text-white hover:bg-indigo-700
                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                          transition-colors">
                    {{ __('Edit Business') }}
                </a>
            </div>
        </div>
    </div>
</div>
