@props([
    'align' => 'left', // Default alignment: 'left' or 'right'
    'width' => '48',   // Default width class: '48' maps to w-48
    'contentClasses' => 'py-1 bg-white dark:bg-gray-700', // Classes for the dropdown content area
    'triggerClasses' => '' // Optional classes to add to the trigger wrapper
])

{{-- Logic to determine CSS classes based on props --}}
@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'ltr:origin-top-left rtl:origin-top-right start-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'ltr:origin-top-right rtl:origin-top-left end-0';
        break;
}

switch ($width) {
    case '48':
        $widthClasses = 'w-48';
        break;
    // Add other widths if needed:
    // case '60':
    //     $widthClasses = 'w-60';
    //     break;
    default:
       $widthClasses = 'w-auto'; // Or set a default like w-48
       break;
}
@endphp

{{-- Alpine.js component wrapper --}}
<div class="relative" {{-- Main container, relative positioning context --}}
     x-data="{ open: false }" {{-- Alpine state: dropdown is initially closed --}}
     @click.outside="open = false" {{-- Close dropdown if click happens outside this div --}}
     @close.stop="open = false" {{-- Custom event to close dropdown (e.g., on Escape key) --}}
     @keydown.escape.window="open = false" {{-- Close dropdown if Escape key is pressed anywhere --}}
>
    {{-- Trigger Slot --}}
    {{-- The element that opens the dropdown goes here --}}
    <div @click="open = ! open" class="{{ $triggerClasses }}"> {{-- Click toggles the 'open' state --}}
        {{ $trigger }}
    </div>

    {{-- Dropdown Content Slot --}}
    {{-- The actual dropdown panel that appears/disappears --}}
    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2 {{ $widthClasses }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;" {{-- Prevents flash of unstyled content before Alpine initializes --}}
            @click="open = false" {{-- Close the dropdown when an item inside is clicked --}}
            >
        <div class="{{ $contentClasses }} rounded-md ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical">
            {{ $content }} {{-- The list items go here --}}
        </div>
    </div>
</div>
