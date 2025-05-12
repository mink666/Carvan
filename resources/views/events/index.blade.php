@extends('layouts.app')

@section('title', 'Upcoming Events')

@section('content')
    <div class="news-events-page">
        <!-- Banner Section -->
        <div class="banner-section">
            <img src="{{ asset('images/events-banner.jpg') }}" alt="Upcoming Events">
            <div class="banner-overlay">
                <p>Join us at our upcoming events and activities</p>
            </div>
        </div>

        <div class="news-events-container">
            <h1 class="main-title">Upcoming Events</h1>

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
                                <span class="vertical-date">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                                    - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</span>
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

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $latestEvents->links() }}
            </div>
        </div>
    </div>
@endsection
