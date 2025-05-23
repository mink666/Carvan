@extends('layouts.app')

@section('title', 'News & Events - Carvan')

@section('content')
    <div class="ne-page">
        <!-- Banner Section -->
        <section class="ne-hero-section">
            <div class="swiper hero-banner-slider">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-1.png') }}" class="ne-slide-image"
                                alt="News & Events">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Latest News & Events</h2>
                                <p>Stay updated with the latest automotive information</p>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide">
                        <div class="ne-slide">
                            <img src="{{ asset('images/news_events/banner-2.png') }}" class="ne-slide-image"
                                alt="News & Events">
                            <div class="ne-slide-overlay"></div>
                            <div class="ne-slide-content">
                                <h2>Connect with Carvan</h2>
                                <p>Discover exciting news and events from Carvan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>

        <div class="ne-container">
            <h1 class="ne-main-title">News & Events</h1>

            <!-- News Section -->
            <div class="ne-section-header">
                <h2>Latest News</h2>
            </div>

            <div class="ne-news-items-container">
                @forelse($latestNews->where('is_active', true) as $news)
                    <div class="ne-news-item-full-width">
                        <div class="item-image">
                            @if ($news->image)
                                <img src="{{ asset('images/' . $news->image) }}" alt="{{ $news->title }}">
                            @else
                                <img src="{{ asset('images/news_events/default-news.jpg') }}" alt="Default news image">
                            @endif
                        </div>
                        <div class="item-content">
                            <div class="item-meta">
                                <span><i class="far fa-calendar"></i> {{ $news->date->format('d/m/Y') }}</span>
                            </div>
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit(strip_tags($news->content), 150) }}</p>
                            <div class="item-footer">
                                <a href="{{ route('news.show', $news->id) }}" class="item-link">
                                    Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ne-empty-state">
                        <i class="fas fa-newspaper"></i>
                        <p>No news available.</p>
                    </div>
                @endforelse
            </div>

            <div class="ne-view-all">
                <a href="{{ route('news.index') }}" class="ne-view-link">
                    View All News <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Events Section -->
            <div class="ne-section-header">
                <h2>Upcoming Events</h2>
            </div>

            <div class="ne-events-items-container">
                @forelse($latestEvents->where('is_active', true) as $event)
                    <div class="ne-event-item-full-width">
                        <div class="item-image">
                            @if ($event->image)
                                <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('images/news_events/default-event.jpg') }}" alt="Default event image">
                            @endif
                            @php
                                $status = 'Upcoming';
                                $statusClass = 'upcoming';
                                $now = \Carbon\Carbon::now();
                                $startDate = \Carbon\Carbon::parse($event->start_date);
                                $endDate = \Carbon\Carbon::parse($event->end_date);

                                if ($now->between($startDate, $endDate)) {
                                    $status = 'Ongoing';
                                    $statusClass = 'ongoing';
                                } elseif ($now->isAfter($endDate)) {
                                    $status = 'Ended';
                                    $statusClass = 'ended';
                                }
                            @endphp
                            <div class="item-status status-{{ $statusClass }}">{{ $status }}</div>
                        </div>
                        <div class="item-content">
                            <div class="item-meta">
                                <span class="event-date">
                                    <i class="far fa-calendar"></i>
                                    @if ($event->start_date && $event->end_date)
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }} -
                                        {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                                    @elseif($event->start_date)
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}
                                    @else
                                        Not specified
                                    @endif
                                </span>
                            </div>
                            <h3>{{ $event->title }}</h3>
                            <p>{{ Str::limit(strip_tags($event->content), 150) }}</p>
                            <div class="item-footer">
                                <a href="{{ route('events.show', $event->id) }}" class="item-link">
                                    View Details <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="ne-empty-state">
                        <i class="fas fa-calendar-alt"></i>
                        <p>No events available.</p>
                    </div>
                @endforelse
            </div>

            <div class="ne-view-all">
                <a href="{{ route('events.index') }}" class="ne-view-link">
                    View All Events <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
