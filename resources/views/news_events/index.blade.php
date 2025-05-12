@extends('layouts.app')

@section('title', 'News & Events')

@section('content')
    <div class="news-events-page">
        <!-- Banner Section -->
        <div class="banner-section">
            <img src="{{ asset('images/pngtree-sporty-red-lamborghini-road-image_2913570.jpg') }}" alt="News & Events">
            <div class="banner-overlay">
                <p>Stay updated with our latest news and upcoming events</p>
            </div>
        </div>

        <div class="news-events-container">
            <h1 class="main-title">News & Events</h1>

            <!-- Latest News Section -->
            <div class="section-header">
                <h2>Latest News</h2>
            </div>

            <div class="vertical-list">
                @forelse($latestNews as $news)
                    <div class="vertical-item">
                        <div class="vertical-img">
                            @if ($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                            @else
                                <img src="{{ asset('images/neon-car.jpg') }}" alt="No image">
                            @endif
                        </div>
                        <div class="vertical-content">
                            <div class="vertical-meta">
                                <span class="vertical-date">{{ $news->date->format('d M Y') }}</span>
                                <span class="vertical-type">NEWS</span>
                            </div>
                            <h3 class="vertical-title">{{ $news->title }}</h3>
                            <p class="vertical-desc">{{ Str::limit(strip_tags($news->content), 150) }}</p>
                            <a href="{{ route('news.show', $news->id) }}" class="vertical-link">Read More</a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="far fa-newspaper"></i>
                        <p>No news available at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="view-all-container">
                <a href="{{ route('news.index') }}" class="view-all-link">
                    View All News <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- CTA Block -->
            <div class="cta-block">
                <div class="cta-icon">
                    <i class="fab fa-facebook"></i>
                </div>
                <div class="cta-content">
                    <div class="cta-title">CARVAN</div>
                    <div class="cta-desc">FOLLOW US ON FACEBOOK</div>
                </div>
            </div>

            <!-- Upcoming Events Section -->
            <div class="section-header">
                <h2>Upcoming Events</h2>
            </div>

            <div class="vertical-list">
                @forelse($latestEvents as $event)
                    <div class="vertical-item">
                        <div class="vertical-img">
                            @if ($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                            @else
                                <img src="{{ asset('images/car-event.jpg') }}" alt="No image">
                            @endif
                        </div>
                        <div class="vertical-content">
                            <div class="vertical-meta">
                                <span class="vertical-date">
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                                </span>
                                <span class="vertical-type">EVENT</span>
                            </div>
                            <h3 class="vertical-title">{{ $event->title }}</h3>
                            <p class="vertical-desc">{{ Str::limit(strip_tags($event->content), 150) }}</p>
                            <a href="{{ route('events.show', $event->id) }}" class="vertical-link">View Details</a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="far fa-calendar-alt"></i>
                        <p>No upcoming events at the moment.</p>
                    </div>
                @endforelse
            </div>

            <div class="view-all-container">
                <a href="{{ route('events.index') }}" class="view-all-link">
                    View All Events <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
