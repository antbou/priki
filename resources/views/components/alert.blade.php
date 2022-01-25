@props(['type' => 'success'])

@php
switch ($type) {
    case 'success':
        $color = 'text-green-700 bg-green-100';
        break;
    case 'danger':
        $color = 'text-red-700 bg-red-100';
        break;
    case 'warning':
        $color = 'text-orange-700 bg-orange-100';
        break;
    default:
        $color = 'text-green-700 bg-green-100';
        break;
}
@endphp

<div class="relative py-3 pl-4 pr-10 leading-normal {{ $color }} rounded-lg" role="alert" x-data="{ open: true }"
    x-show="open">
    <p>{{ $message }}</p>
    <span class=" absolute inset-y-0 right-0 flex items-center mr-4">
        <svg class="w-4 h-4 fill-current" role="button" viewBox="0 0 20 20" x-on:click="open = false">
            <path
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
    </span>
</div>
