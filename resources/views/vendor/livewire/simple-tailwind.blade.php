<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center gap-2 my-3">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <x-bladewind.button
                        disabled
                        size="tiny"
                        icon="arrow-left-circle">
                        {{ __('Previous') }}
                    </x-bladewind.button>
                @else
                    @if(method_exists($paginator,'getCursorName'))
                        {{-- // @todo: Remove `wire:key` once mutation observer has been fixed to detect parameter change for the `setPage()` method call --}}
                        <x-bladewind.button
                            dusk="previousPage"
                            wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->previousCursor()->encode() }}"
                            wire:click="setPage('{{$paginator->previousCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled"
                            size="tiny"
                            icon="arrow-left-circle"
                        >
                            {{ __('Previous') }}
                        </x-bladewind.button>
                    @else
                        <x-bladewind.button
                            wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            size="tiny"
                            icon="arrow-left-circle"
                        >
                            {{ __('Previous') }}
                        </x-bladewind.button>
                    @endif
                @endif
            </span>

            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    @if(method_exists($paginator,'getCursorName'))
                        {{-- // @todo: Remove `wire:key` once mutation observer has been fixed to detect parameter change for the `setPage()` method call --}}
                        <x-bladewind.button
                            dusk="nextPage"
                            wire:key="cursor-{{ $paginator->getCursorName() }}-{{ $paginator->nextCursor()->encode() }}"
                            wire:click="setPage('{{$paginator->nextCursor()->encode()}}','{{ $paginator->getCursorName() }}')"
                            wire:loading.attr="disabled"
                            size="tiny"
                            icon="arrow-right-circle"
                            icon_right="true"
                        >
                            {{ __('Next') }}
                        </x-bladewind.button>
                    @else
                        <x-bladewind.button
                            wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            size="tiny"
                            icon="arrow-right-circle"
                            icon_right="true"
                        >
                            {{ __('Next') }}
                        </x-bladewind.button>
                    @endif
                @else
                    <x-bladewind.button
                        disabled
                        size="tiny"
                        icon="arrow-right-circle"
                        icon_right="true">
                        {{ __('Next') }}
                    </x-bladewind.button>
                @endif
            </span>
        </nav>
    @endif
</div>
