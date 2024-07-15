{{-- <button class=" bg-gray-600 mb-10 hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 disabled:cursor-not-allowed">Coba</button> --}}

<div class="hidden">
    <span class="bg-red-600 hover:bg-red-500 focus-visible:outline-red-600"></span>
    <span class="bg-indigo-600 hover:bg-indigo-500 focus-visible:outline-indigo-600"></span>
    <span class="bg-gary-600 hover:bg-gary-500 focus-visible:outline-gary-600"></span>
    <!-- Add other colors as needed -->
</div>

@php
    $buttonColorClass = 'bg-' . $buttonColor . '-600';
    $hoverColorClass = 'hover:bg-' . $buttonColor . '-500';
    $outlineColorClass = 'focus-visible:outline-' . $buttonColor . '-600';
@endphp

{{-- <button {{ $attributes }} class="rounded-md mx-2 bg-{{ $buttonColor }}-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-{{ $buttonColor }}-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-{{ $buttonColor }}-600 disabled:cursor-not-allowed">{{ $slot }}</button> --}}
<button {{ $attributes->merge(['class' => "rounded-md mx-2 px-3 py-2 text-sm font-semibold text-white shadow-sm disabled:cursor-not-allowed $buttonColorClass $hoverColorClass $outlineColorClass"]) }}>{{ $slot }}</button>