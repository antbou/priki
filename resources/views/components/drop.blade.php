<div x-data="{ show: false }">
    <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }"
        class="mt-1 text-sm text-gray-500 cursor-pointer">
        {{ $label }}
    </button>

    <div x-show="show" class="group-hover:block  bg-white  w-auto">
        {{ $slot }}
    </div>
</div>
