<div>
    <a href='{{ url("customers/{$this->id}") }}' wire:navigate>< retour</a>
    <form wire:submit="update">
        @csrf
        <x-bladewind.card>
            <b class="mt-0">Edit Your Profile</b>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div>
                    <x-bladewind.input required="true" wire:model="name" label="Name" />
                    @error('name')
                    <div class="text-red-500 text-xs">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <x-bladewind.input wire:model="firstname" label="First name" />
                    @error('firstname')
                    <div class="text-red-500 text-xs">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <x-bladewind.button can_submit>
                Update
                <div wire:loading.delay.longest>
                    <x-bladewind.spinner class="mr-2 ml-2" />
                </div>
            </x-bladewind.button>
        </x-bladewind.card>
    </form>
</div>
