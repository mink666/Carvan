@props([
    'triggerText',
    'items',
    'itemType',
    'activeTabInitial',
    'dropdownId' => $triggerText
])

<div class="relative"
     x-data="{
         isOpen: false,
         activeTab: '{{ $activeTabInitial }}'
     }"
     @dropdown-open.window="if($event.detail.openId !== '{{ $dropdownId }}') { isOpen = false; }">
    <button type="button"
            @click="isOpen = !isOpen;
                    if(isOpen) {
                        $dispatch('dropdown-open', { openId: '{{ $dropdownId }}' });
                        if(!activeTab && {{ $items->count() }} > 0) { activeTab = '{{ $items->first()->id ?? '' }}'; }
                    }"
            @keydown.escape.window="isOpen = false"
            class="flex items-center text-sm font-bold text-black hover:underline transform transition duration-300 ease-in-out hover:scale-105 focus:outline-none">
        {{ $triggerText }}
        <svg class="ml-1 h-4 w-4 fill-current text-black transition-transform duration-200 ease-in-out"
             :class="{ 'rotate-90': isOpen }"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="isOpen"
         x-cloak
         @click.self="isOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="fixed inset-x-0 top-15 z-30 pt-[--navbar-height]
                h-screen overflow-y-auto bg-black bg-opacity-25 backdrop-blur-sm"
         style="display: none;">

        <div class="bg-white shadow-2xl w-full">
            <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="relative grid gap-4 py-5 md:py-8 md:grid-cols-3">
                    <div class="md:col-span-1 border-b md:border-b-0 md:border-r border-gray-200 pb-4 md:pb-0 md:pr-6 space-y-1 overflow-y-auto max-h-[calc(100vh-var(--navbar-height)-theme(spacing.20))]"> {{-- Adjusted max-height --}}
                        @forelse ($items as $item)
                            <button @click="activeTab = '{{ $item->id }}'"
                                    :class="{
                                        'bg-red-50 text-red-700 font-semibold': activeTab == '{{ $item->id }}',
                                        'text-gray-700 hover:bg-gray-100 hover:text-red-600': activeTab != '{{ $item->id }}'
                                    }"
                                    class="w-full text-left block rounded-md p-3 text-sm md:text-base font-medium transition ease-in-out duration-150 focus:outline-none">
                                {{ $item->name }}
                            </button>
                        @empty
                            <p class="text-gray-500 p-3 text-sm">No {{ Str::plural($itemType) }} available.</p>
                        @endforelse
                    </div>

                    <div class="md:col-span-2 md:pl-6 pt-4 md:pt-0 overflow-y-auto max-h-[calc(100vh-var(--navbar-height)-theme(spacing.20))]">
                        @if ($items->count() > 0)
                            @foreach ($items as $item)
                                <div x-show="activeTab == '{{ $item->id }}'" x-cloak class="space-y-3">
                                    <div class="flex justify-between items-center mb-3">
                                        <h3 class="text-lg md:text-xl font-semibold text-gray-900">
                                            {{ $item->name }} Models
                                        </h3>
                                        @if ($itemType === 'brand')
                                            <a href="{{ route('brands.show', ['brand' => $item->id]) }}"
                                               class="text-xs md:text-sm font-medium text-red-600 hover:text-red-800 transition ease-in-out duration-150 whitespace-nowrap">
                                                View all {{ $item->name }} &rarr;
                                            </a>
                                        @elseif ($itemType === 'range')
                                            <a href="{{ route('range_of_car.show', ['rangeOfCar' => $item->id]) }}"
                                                class="text-xs md:text-sm font-medium text-red-600 hover:text-red-800 transition ease-in-out duration-150 whitespace-nowrap">
                                                View all {{ $item->name }} &rarr;
                                            </a>
                                        @endif
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4">
                                        @forelse ($item->carModels as $model)
                                            <a href="{{ route('car_models.show', ['carModel' => $model->id]) }}"
                                               class="block group p-3 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150 border border-gray-100 hover:border-gray-200">
                                                <div class="flex items-start space-x-3">
                                                    <div class="flex-shrink-0 mt-1">
                                                        <img class="h-12 w-20 md:h-16 md:w-24 object-contain rounded"
                                                             src="{{ $model->image ? asset($model->image) : asset('assets/images/default-car.png') }}"
                                                             alt="{{ $model->name }}">
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-sm md:text-base font-semibold text-gray-900 group-hover:text-red-600 leading-tight">
                                                            {{ $model->name }} {{ $model->year ? '('.$model->year.')' : '' }}
                                                            @if ($itemType === 'range' && $model->brand)
                                                                <span class="block text-xs text-gray-500">{{ $model->brand->name }}</span>
                                                            @endif
                                                        </p>
                                                        @if(isset($model->inventories_min_price) && $model->inventories_min_price > 0)
                                                        <p class="text-xs md:text-sm text-red-500 font-medium">
                                                            Price from: {{ number_format($model->inventories_min_price, 0, ',', '.') }} VNĐ
                                                        </p>
                                                        @endif
                                                        <p class="mt-1 text-xs text-gray-500 group-hover:text-red-500">
                                                            View details &rarr;
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                            <p class="text-gray-500 col-span-full text-sm">No models currently available for this {{ $itemType }}</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 text-sm">Select a {{ $itemType }} to see models.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
