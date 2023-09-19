<div>
    <form wire:submit="update">
        @csrf
        <x-bladewind.card>
            <b class="mt-0">Edit customer</b>
            <div class="grid grid-cols-4 gap-4 mt-6">
                <div class="col-span-2">
                    <x-bladewind.input
                        required="true"
                        wire:model="name"
                        label="Name"
                    />
                    @error('name')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-bladewind.input
                        wire:model="firstname"
                        label="First name"
                    />
                    @error('firstname')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4">
                    <x-bladewind.input
                        wire:model="street"
                        label="Street"
                    />
                    @error('street')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-1">
                    <x-bladewind.input
                        wire:model="postcode"
                        label="Postcode"
                    />
                    @error('postcode')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3">
                    <x-bladewind.input
                        wire:model="city"
                        label="City"
                    />
                    @error('city')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-bladewind.input
                        wire:model="phone"
                        label="Phone"
                    />
                    @error('phone')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-bladewind.input
                        wire:model="email"
                        label="Email"
                    />
                    @error('email')
                        <div class="text-red-500 text-xs">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex gap-2 justify-end">
                <a
                    href='{{ url("customers/{$this->id}") }}'
                    wire:navigate
                >
                    <x-bladewind.button color="red">
                        Cancel
                    </x-bladewind.button>
                </a>
                <x-bladewind.button can_submit>
                    Update
                    <div wire:loading.delay.longest>
                        <x-bladewind.spinner class="mr-2 ml-2" />
                    </div>
                </x-bladewind.button>
            </div>
        </x-bladewind.card>
    </form>
</div>
