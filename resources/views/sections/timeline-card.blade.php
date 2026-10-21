@php
    $offset = ($index * 3.75).'rem';
    $base = 'timeline-stagger group relative block h-56 overflow-hidden rounded-lg border border-border opacity-0 transition';
@endphp

@if ($card->link)
    <a href="{{ $card->link }}" target="_blank" rel="noopener noreferrer"
       class="{{ $base }}"
       style="--offset: {{ $offset }};"
       data-timeline-card>
        @include('sections.timeline-card-inner', ['card' => $card])
    </a>
@else
    <div class="{{ $base }}"
         style="--offset: {{ $offset }};"
         data-timeline-card>
        @include('sections.timeline-card-inner', ['card' => $card])
    </div>
@endif
