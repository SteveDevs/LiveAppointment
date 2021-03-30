{{-- Injected variables: $event --}}
<div
    class="{{ $styles['event'] }}"
    >

    <div class="{{ $styles['eventTitle'] }}">
        {{ $event['starts_at']->format('h:i A') }} - {{ $event['ends_at']->format('h:i A') }}
    </div>

    <div class="{{ $styles['eventBody'] }}">
        <div>
            {{ $event['title'] }}
        </div>
    </div>
</div>
