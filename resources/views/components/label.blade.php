<div class="relative">
    <label {{ $attributes }} class="block text-sm font-medium leading-6 text-gray-900">
        {{ $slot }}
        <span class="absolute top-0 left-30 text-red-600 {{ $isRequired == 'true' ? '' : 'hidden' }}">*</span>
    </label>
</div>