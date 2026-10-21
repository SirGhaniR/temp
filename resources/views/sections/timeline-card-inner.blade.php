@if ($card->image_path)
  <img class="absolute inset-0 h-full w-full object-cover transition duration-200 group-hover:grayscale-75"
    src="{{ $card->imageUrl() }}" alt="{{ $card->headline }}">
@else
  <div class="absolute inset-0 bg-white"></div>
@endif

<div class="absolute inset-0 bg-linear-to-t from-black/75 via-black/30 to-black/0"></div>

<div class="absolute inset-x-0 bottom-0 p-5">
  <p class="text-sm font-semibold text-white">{{ $card->headline }}</p>

  @if ($card->description)
    <p
      class="mt-2 max-h-0 overflow-hidden text-xs text-white/80 opacity-0 transition-all duration-300 group-hover:max-h-32 group-hover:opacity-100">
      {{ $card->description }}
    </p>
  @endif
</div>
