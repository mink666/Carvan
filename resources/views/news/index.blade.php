@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
    <div class="news-events-page">
        <!-- Banner Section -->
        <div class="banner-section">
            <img src="{{ asset('images/news-banner.jpg') }}" alt="Latest News">
            <div class="banner-overlay">
                <p>Stay updated with our latest news and announcements</p>
            </div>
        </div>

        <div class="news-events-container">
            <h1 class="main-title">Latest News</h1>

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

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $latestNews->links() }}
            </div>
        </div>
    </div>
@endsection
