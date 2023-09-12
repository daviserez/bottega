<x-app-layout>
    <x-slot:title>
        {{ "$customer->firstname $customer->name" }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ "$customer->firstname $customer->name" }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <livewire:customers.show :customer="$customer" />
        </div>
    </div>
</x-app-layout>
