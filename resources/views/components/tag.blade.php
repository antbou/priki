@props(['type' => 'success'])

@php
switch ($type) {
    case 'success':
        $color = 'text-pink-100 bg-green-600';
        break;
    case 'danger':
        $color = 'text-pink-100 bg-red-600';
        break;
    case 'warning':
        $color = 'text-pink-100 bg-orange-600';
        break;
    case 'lady':
        $color = 'text-pink-100 bg-pink-600';
        break;
    case 'man':
        $color = 'text-pink-100 bg-blue-600';
        break;
    default:
        $color = 'text-pink-100 bg-green-600';
        break;
}
@endphp

<span
    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none {{ $color }} rounded-full">
    {{ $slot }}
</span>
