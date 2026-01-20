<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <!-- Platform -->
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate>
                {{ __('Dashboard') }}
            </flux:navlist.item>


            @if (auth()->user()->can('manage_system_users') || auth()->user()->can('manage_businesses'))
                {{-- <flux:navlist.item icon="users" :href="route('users.index')"
                    :current="request()->routeIs('users.index')" wire:navigate>{{ __('Users') }}</flux:navlist.item> --}}

                <flux:navlist.group expandable heading="Admin Management" icon="building-office-2"
                    :expanded="request()->is('users*') || request()->is('business*')">
                    <flux:navlist.item icon="users" href="{{ route('users.index') }}"
                        :current="request()->is('users*')">
                        Users
                    </flux:navlist.item>

                    <flux:navlist.item icon="building-storefront" href="{{ route('business.index') }}"
                        :current="request()->is('business*')">
                        Business
                    </flux:navlist.item>


                </flux:navlist.group>
            @endif



            <!-- Sales -->
            <flux:navlist.group expandable heading="Sales" icon="building-office-2"
                :expanded="request()->is('') || request()->is('branches*')">
                <flux:navlist.item icon="users" href="/users" :current="request()->is('users*')">
                    Cash Sales
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Credit Sales
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Sales History
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Customers
                </flux:navlist.item>
            </flux:navlist.group>


            {{-- Purchase --}}
            <flux:navlist.group expandable heading="Purchasang" icon="building-office-2"
                :expanded="request()->is('') || request()->is('branches*')">
                <flux:navlist.item icon="users" href="/users" :current="request()->is('users*')">
                    Users
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Branches
                </flux:navlist.item>
            </flux:navlist.group>


            {{-- Inventory --}}
            <flux:navlist.group expandable heading="Inventory" icon="building-office-2"
                :expanded="request()->is('') || request()->is('branches*')">
                <flux:navlist.item icon="users" href="/users" :current="request()->is('users*')">
                    Current Stock
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Products List
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Price List
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Stock Adjustment
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Stock Count
                </flux:navlist.item>
            </flux:navlist.group>

            {{-- Accounting --}}
            <flux:navlist.group expandable heading="Accounting" icon="building-office-2"
                :expanded="request()->is('') || request()->is('branches*')">
                <flux:navlist.item icon="users" href="/users" :current="request()->is('users*')">
                    Users
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Branches
                </flux:navlist.item>
            </flux:navlist.group>

            {{-- Reports --}}
            {{-- <flux:navlist.group expandable heading="Reports" icon="building-office-2"
                :expanded="request()->is('users*') || request()->is('branches*')">
                <flux:navlist.item icon="users" href="/users" :current="request()->is('users*')">
                    Users
                </flux:navlist.item>

                <flux:navlist.item icon="building-storefront" href="/branches" :current="request()->is('branches*')">
                    Branches
                </flux:navlist.item>
            </flux:navlist.group> --}}


            {{-- Settings --}}
            <flux:navlist.group expandable heading="Settings" icon="cog-6-tooth"
                :expanded="request()->routeIs('users.*')">

                <!-- General – expandable -->
                <flux:navlist.group expandable heading="General" icon="adjustments-horizontal"
                    :expanded="request()->routeIs('settings.general.*')">
                    <flux:navlist.item icon="cog-8-tooth" href=""
                        :current="request()->routeIs('settings.general.configurations')">
                        Configurations
                    </flux:navlist.item>

                    <flux:navlist.item icon="tag" href=""
                        :current="request()->routeIs('settings.general.product-categories')">
                        Product Categories
                    </flux:navlist.item>

                    <flux:navlist.item icon="currency-dollar" href=""
                        :current="request()->routeIs('settings.general.price-categories')">
                        Price Categories
                    </flux:navlist.item>

                    <flux:navlist.item icon="building-office-2" href=""
                        :current="request()->routeIs('settings.general.branches')">
                        Branches
                    </flux:navlist.item>
                </flux:navlist.group>

                <!-- Security – expandable -->
                <flux:navlist.group expandable heading="Security" icon="shield-check"
                    :expanded="request()->routeIs('users.*')">
                    <flux:navlist.item icon="users" href="{{ route('users.index') }}"
                        :current="request()->routeIs('users.*')">
                        Users
                    </flux:navlist.item>
                    <flux:navlist.item icon="cog-8-tooth" href=""
                        :current="request()->routeIs('settings.general.product-categories')">
                        Roles
                    </flux:navlist.item>

                </flux:navlist.group>

                <!-- Tools – expandable -->
                <flux:navlist.group expandable heading="Tools" icon="wrench-screwdriver"
                    :expanded="request()->routeIs('settings.tools.*')">
                    <flux:navlist.item href="" :current="request()->routeIs('settings.tools.backup')">
                        Backup & Restore
                    </flux:navlist.item>
                    <flux:navlist.item href="" :current="request()->routeIs('settings.tools.logs')">
                        System Logs
                    </flux:navlist.item>
                    <flux:navlist.item href="" :current="request()->routeIs('settings.tools.api')">
                        API Keys
                    </flux:navlist.item>
                </flux:navlist.group>

            </flux:navlist.group>




        </flux:navlist>

        <flux:spacer />

        <!-- Desktop User Menu -->
        <flux:dropdown class="hidden lg:block" position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon:trailing="chevrons-up-down" data-test="sidebar-menu-button" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full"
                        data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                        class="w-full" data-test="logout-button">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
