<div class="flex items-center gap-1">
    @php $rating = $track->rating @endphp

    <div class="flex items-center">
        @for($i = 1; $i <= 5; $i++)
            <button wire:click="rate({{ $i }})" class="text-sm">
                @if($rating >= $i)
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">...</svg>
                @else
                    <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">...</svg>
                @endif
            </button>
        @endfor
    </div>

    <div class="text-xs text-gray-500 ml-2">({{ $track->rating_votes }})</div>
</div>