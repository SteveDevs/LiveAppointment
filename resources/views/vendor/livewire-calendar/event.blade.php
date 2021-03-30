<div
    @if($eventClickEnabled)
        wire:click.stop="onEventClick('{{ $event['id']  }}')"
    @endif
    class="bg-white rounded-lg border py-2 px-3 shadow-md cursor-pointer">
    <p class="text-xxs text-theme-color-dark text-opacity-80">
        {{ Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $event['date'])->toTimeString() }} - {{ Carbon\Carbon::createFromFormat('Y-m-d H:m:s', $event['finish_time'])->toTimeString() }}
    </p>
    <p class="text-sm font-medium text-theme-color-dark text-opacity-80">
        {{ $event['title'] }}
    </p>
    <p class="mt-2 text-xs text-theme-color-dark text-opacity-80">
        {{ $event['description'] ?? __('No description') }}
    </p>
</div>
