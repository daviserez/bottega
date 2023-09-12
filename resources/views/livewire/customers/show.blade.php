<div>
    <a href="{{ url('customers') }}" wire:navigate>< retour</a>

    <div class="flex gap-4">
        <div>
            <x-bladewind.contact-card
                name="{{ $customer->firstname }} {{ $customer->name }}"
                mobile="{{ $customer->phone }}"
                email="{{ $customer->email }}"
            >
                <div class="text-sm mb-1 flex">
                    <x-bladewind.icon name="map-pin" class="h-4 w-4 inline-block mr-2 opacity-60" />
                    <div>
                        <div>{{ $customer->street }}</div>
                        <div>{{ $customer->postcode }} {{ $customer->city }}</div>
                    </div>
                </div>
            </x-bladewind.contact-card>
            <div class="mt-3 flex justify-end gap-3">
                <x-bladewind.button.circle icon="pencil-square" size="small" wire:click="edit" />
                <x-bladewind.button.circle icon="trash" size="small" color="red" />
            </div>
        </div>
        <div class="grow">
            <x-bladewind.card class="h-96">
            </x-bladewind.card>
        </div>
    </div>
</div>
