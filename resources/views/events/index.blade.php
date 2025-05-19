@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="ne-page">
        <!-- Hero Banner Section -->
        <section class="ne-hero-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-1.jpg') }}" class="ne-slide-image"
                                alt="Upcoming Events">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Upcoming Events</h2>
                                <p>Join us at our exciting upcoming events</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-2.jpg') }}" class="ne-slide-image" alt="Events">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Stay Connected</h2>
                                <p>Don't miss out on our exclusive events</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <div class="ne-container">
            <div class="text-center mb-10 md:mb-16">
                <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">ALL EVENTS</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-1">Carvan World Events</h2>
            </div>

            <div class="news-items-container rounded-lg shadow-lg overflow-hidden">
                @forelse($latestEvents as $event)
                    <article
                        class="news-item-full-width group {{ $loop->index % 2 === 0 ? 'bg-black text-white' : 'bg-white text-gray-800' }}">
                        <div
                            class="md:flex md:items-center {{ $loop->index % 2 === 1 ? 'md:flex-row-reverse' : '' }} py-10 md:py-16 md:space-x-reverse md:space-x-8 lg:space-x-12">
                            <!-- Cột Ảnh -->
                            <div class="md:w-1/2 lg:w-3/5 mb-6 md:mb-0">
                                <a href="{{ route('events.show', $event->id) }}"
                                    class="block overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                                    @if ($event->image)
                                        <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}"
                                            class="w-full h-auto object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-105 aspect-[16/9]">
                                    @else
                                        <img src="{{ asset('images/news_events/default-event.jpg') }}"
                                            alt="Default event image"
                                            class="w-full h-auto object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-105 aspect-[16/9]">
                                    @endif
                                </a>
                            </div>

                            <!-- Cột Nội dung Text -->
                            <div class="md:w-1/2 lg:w-2/5 flex flex-col justify-center">
                                <p class="text-xs {{ $loop->index % 2 === 0 ? 'text-gray-400' : 'text-gray-500' }} mb-2">
                                    <span>
                                        @if ($event->start_date && $event->end_date)
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('j M Y') }} -
                                            {{ \Carbon\Carbon::parse($event->end_date)->format('j M Y') }}
                                        @elseif($event->start_date)
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('j M Y') }}
                                        @else
                                            Date TBA
                                        @endif
                                    </span>
                                </p>
                                <p
                                    class="text-xs font-semibold {{ $loop->index % 2 === 0 ? 'text-red-400' : 'text-red-500' }} uppercase tracking-wider mb-2">
                                    EVENT
                                </p>
                                <h3
                                    class="text-2xl md:text-3xl font-bold {{ $loop->index % 2 === 0 ? 'text-white group-hover:text-red-300' : 'text-gray-900 group-hover:text-red-700' }} mb-3 leading-tight transition-colors">
                                    <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                                </h3>
                                <p
                                    class="{{ $loop->index % 2 === 0 ? 'text-gray-300' : 'text-gray-700' }} mb-6 leading-relaxed text-base">
                                    {{ Str::limit(strip_tags($event->content), 150) }}
                                </p>
                                <a href="{{ route('events.show', $event->id) }}"
                                    class="self-start inline-block font-semibold py-2.5 px-6 rounded-md text-sm
                                          @if ($loop->index % 2 === 0) bg-white text-black hover:bg-gray-400 focus:ring-2 focus:ring-gray-300
                                          @else
                                            border border-gray-700 text-gray-800 hover:bg-gray-800 hover:text-white hover:border-gray-800 focus:ring-2 focus:ring-gray-600 @endif
                                          transition-all duration-300">
                                    VIEW DETAILS
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-calendar-alt"></i>
                        <p>No upcoming events at the moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($latestEvents->hasPages())
                <div class="pagination-container">
                    {{ $latestEvents->links() }}
                </div>
            @endif

            <!-- Back Button -->
            <div class="text-center mt-8 mb-8">
                <a href="{{ route('news_events.index') }}"
                    class="inline-block bg-gray-800 text-white font-semibold py-3 px-8 rounded-lg hover:bg-gray-700 transition-colors duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-arrow-left mr-2"></i>Back to News & Events
                </a>
            </div>
        </div>
    </div>
@endsection
