<div x-data="{ restoreCustomer: [] }">
    <div class="mb-3">
        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
            <input
                wire:keydown="search"
                wire:model="searchTerms"
                type="search"
                class="relative m-0 block w-[1px] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="button-addon2"
            />
            <span
                class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="h-5 w-5"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd"
                    />
                </svg>
            </span>
            <x-bladewind.button
                wire:click="toggleArchive"
                type="{{ $this->displayArchived ? 'primary' : 'secondary' }}"
                size="small"
            >
                {{ $this->displayArchived ? 'Hide archived' : 'Show archived' }}
            </x-bladewind.button>
        </div>
    </div>
    <x-bladewind.table
        striped="true"
        divider="thin"
    >
        <x-slot name="header">
            <th>{{ __('Name') }}</th>
            <th>{{ __('Phone') }}</th>
            <th>{{ __('Address') }}</th>
            <th>{{ __('City') }}</th>
        </x-slot>
        @forelse ($customers as $customer)
            <tr>
                @if ($this->displayArchived)
                    <td
                        class="text-sm font-medium text-slate-900"
                        @click="restoreCustomer = [{{ $customer->id }}, '{{ $customer->firstname }}', '{{ $customer->name }}']; showModal('restore')"
                    >
                        <x-bladewind.icon name="archive-box-x-mark" />
                        {{ $customer->firstname }} {{ $customer->name }}
                    </td>
                @else
                    <td class="text-sm font-medium text-slate-900">
                        <a
                            href='{{ url("customers/{$customer->id}") }}'
                            wire:navigate
                        >
                            {{ $customer->firstname }} {{ $customer->name }}
                        </a>
                    </td>
                @endif
                <td class="text-sm text-slate-500 truncate">
                    {{ $customer->phone }}
                </td>
                <td class="text-sm font-medium text-slate-500">
                    {{ $customer->street }}
                </td>
                <td class="text-sm text-slate-500 truncate">
                    {{ $customer->postcode }}
                    {{ $customer->city }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="text-center">No customer found</div>
                </td>
            </tr>
        @endforelse
    </x-bladewind.table>
    {{ $customers->links() }}
    <x-bladewind.modal
        type="info"
        size="big"
        name="restore"
        ok_button_label="restore"
        close_after_action="false"
        ok_button_action="document.getElementById('ok-restore').click()"
    >
        Do you want to restore <strong x-text="restoreCustomer[1]"></strong>
        <strong x-text="restoreCustomer[2]"></strong>?
        <input
            type="hidden"
            id="ok-restore"
            wire:click="restore(restoreCustomer[0])"
        />
    </x-bladewind.modal>
</div>
