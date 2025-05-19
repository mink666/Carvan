@extends('layouts.app')

@section('title', $latestEvents->title)

@section('content')
    <div class="events-show-page">
        <!-- Hero Banner Section -->
        <section class="ne-hero-section">
            <div class="ne-hero-banner">
                <div class="ne-slide">
                    @if ($latestEvents->image)
                        <img src="{{ asset('images/' . $latestEvents->image) }}" class="ne-slide-image"
                            alt="{{ $latestEvents->title }}">
                    @else
                        <img src="{{ asset('images/news_events/default-event.jpg') }}" class="ne-slide-image"
                            alt="Default event image">
                    @endif
                    <div class="ne-slide-overlay"></div>
                </div>
            </div>
        </section>

        <div class="show-header-full-width">
            <div class="show-header-content">
                <div class="show-meta">
                    <span class="show-date"><i class="far fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($latestEvents->start_date)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($latestEvents->end_date)->format('d M Y') }}
                    </span>
                </div>
                <h1 class="show-title">{{ $latestEvents->title }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="show-content">
                {!! $latestEvents->content !!}
            </div>
            <div class="show-back">
                <a href="{{ route('events.index') }}" class="vertical-link">Back to Events</a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function shareOnFacebook() {
                const url = encodeURIComponent(window.location.href);
                const title = encodeURIComponent('{{ $latestEvents->title }}');
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${title}`, 'facebook-share',
                    'width=580,height=296');
            }

            function shareOnTwitter() {
                const url = encodeURIComponent(window.location.href);
                const title = encodeURIComponent('{{ $latestEvents->title }}');
                window.open(`https://twitter.com/intent/tweet?text=${title}&url=${url}`, 'twitter-share',
                    'width=580,height=296');
            }

            function shareOnLinkedIn() {
                const url = encodeURIComponent(window.location.href);
                const title = encodeURIComponent('{{ $latestEvents->title }}');
                window.open(`https://www.linkedin.com/shareArticle?mini=true&url=${url}&title=${title}`, 'linkedin-share',
                    'width=580,height=296');
            }
        </script>
    @endpush
@endsection
