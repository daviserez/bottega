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
            <div class="mt-3 flex justify-end gap-2">
                <x-bladewind.button.circle icon="pencil-square" size="small" wire:click="edit" />
                <x-bladewind.button.circle icon="archive-box" size="small" @click="showModal('archive')" />
            </div>
        </div>
        <div class="grow">
            <x-bladewind.card class="h-96">
            </x-bladewind.card>
        </div>
    </div>

    <x-bladewind.modal
        type="info"
        size="big"
        close_after_action="false"
        title="Archive {{$customer->firstname}} {{$customer->name}}"
        name="archive"
        ok_button_label="archive"
        ok_button_action="document.getElementById('ok-archive').click()"
    >
        Archived user will not show up in the customers list anymore.
        They can be restored from there and will still count in yearly reports.
        <input type="hidden" id="ok-archive" wire:click="archive" />
    </x-bladewind.modal>
</div>
