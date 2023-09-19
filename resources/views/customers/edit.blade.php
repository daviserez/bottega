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
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <livewire:customers.edit
                :id="$customer->id"
                :name="$customer->name"
                :firstname="$customer->firstname"
                :phone="$customer->phone"
                :street="$customer->street"
                :postcode="$customer->postcode"
                :city="$customer->city"
                :country="$customer->country"
                :email="$customer->email"
            />
        </div>
    </div>
</x-app-layout>
