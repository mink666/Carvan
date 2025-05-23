@extends('layouts.app')

@section('title', 'News - Carvan')

@section('content')
    <div class="ne-page">
        <!-- Hero Banner Section -->
        <section class="ne-hero-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-1.png') }}" class="ne-slide-image" alt="Latest News">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Latest News</h2>
                                <p>Stay updated with our latest news and announcements</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-2.jpg') }}" class="ne-slide-image" alt="News">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Stay Connected</h2>
                                <p>Discover the latest updates from Carvan</p>
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
                <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">ALL NEWS</p>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-1">Carvan World News</h2>
            </div>

            <div class="news-items-container rounded-lg shadow-lg overflow-hidden">
                @forelse($latestNews as $item)
                    <article
                        class="news-item-full-width group {{ $loop->index % 2 === 0 ? 'bg-black text-white' : 'bg-white text-gray-800' }}">
                        <div
                            class="md:flex md:items-center {{ $loop->index % 2 === 1 ? 'md:flex-row-reverse' : '' }} py-10 md:py-16 md:space-x-reverse md:space-x-8 lg:space-x-12">
                            <!-- Cột Ảnh -->
                            <div class="md:w-1/2 lg:w-3/5 mb-6 md:mb-0">
                                <a href="{{ route('news.show', $item->id) }}"
                                    class="block overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                                    @if ($item->image)
                                        <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}"
                                            class="w-full h-auto object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-105 aspect-[16/9]">
                                    @else
                                        <img src="{{ asset('images/news_events/default-news.jpg') }}"
                                            alt="Default news image"
                                            class="w-full h-auto object-cover transform transition-transform duration-500 ease-in-out group-hover:scale-105 aspect-[16/9]">
                                    @endif
                                </a>
                            </div>

                            <!-- Cột Nội dung Text -->
                            <div class="md:w-1/2 lg:w-2/5 flex flex-col justify-center">
                                <p class="text-xs {{ $loop->index % 2 === 0 ? 'text-gray-400' : 'text-gray-500' }} mb-2">
                                    <span>{{ $item->date->format('j M Y') }}</span>
                                </p>
                                <p
                                    class="text-xs font-semibold {{ $loop->index % 2 === 0 ? 'text-red-400' : 'text-red-500' }} uppercase tracking-wider mb-2">
                                    NEWS
                                </p>
                                <h3
                                    class="text-2xl md:text-3xl font-bold {{ $loop->index % 2 === 0 ? 'text-white group-hover:text-red-300' : 'text-gray-900 group-hover:text-red-700' }} mb-3 leading-tight transition-colors">
                                    <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                                </h3>
                                <p
                                    class="{{ $loop->index % 2 === 0 ? 'text-gray-300' : 'text-gray-700' }} mb-6 leading-relaxed text-base">
                                    {{ Str::limit(strip_tags($item->content), 150) }}
                                </p>
                                <a href="{{ route('news.show', $item->id) }}"
                                    class="self-start inline-block font-semibold py-2.5 px-6 rounded-md text-sm
                                          @if ($loop->index % 2 === 0) bg-white text-black hover:bg-gray-400 focus:ring-2 focus:ring-gray-300
                                          @else
                                            border border-gray-700 text-gray-800 hover:bg-gray-800 hover:text-white hover:border-gray-800 focus:ring-2 focus:ring-gray-600 @endif
                                          transition-all duration-300">
                                    READ MORE
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <p>No news articles available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($latestNews->hasPages())
                <div class="pagination-container">
                    {{ $latestNews->links() }}
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
