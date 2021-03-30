{{-- Injected variables: $resource, $eventsInHourSlot --}}
<div
    class="{{ $styles['resourceColumnHourSlot'] }}"
    style="height: {{ $hourHeightInRems / (60/$interval) }}rem;"
    id="{{ $_instance->id }}-{{ $resource['id'] }}-{{ $hour }}-{{$slot}}"

   
>

    @foreach($eventsInHourSlot as $event)
        <div
            class="{{ $styles['eventWrapper'] }}"
            style="{{ $getEventStyles($event, $events) }}"

            

            
        >
            @include($eventView, [
                'event' => $event,
            ])
        </div>
    @endforeach

</div>
