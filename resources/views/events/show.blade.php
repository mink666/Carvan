@extends('layouts.app')

@section('title', $latestEvents->title)

@section('content')
    <div class="events-show-page modern-show">
        <div class="show-image">
            @if ($latestEvents->image)
                <img src="{{ asset('storage/' . $latestEvents->image) }}" alt="{{ $latestEvents->title }}">
            @else
                <img src="{{ asset('images/no-image.png') }}" alt="No image">
            @endif
        </div>
        <div class="show-header">
            <div class="show-meta">
                <span class="show-date"><i class="far fa-calendar"></i>
                    {{ \Carbon\Carbon::parse($latestEvents->start_date)->format('d M Y') }} -
                    {{ \Carbon\Carbon::parse($latestEvents->end_date)->format('d M Y') }}
                </span>
            </div>
            <h1 class="show-title">{{ $latestEvents->title }}</h1>
        </div>
        <div class="show-content">
            {!! $latestEvents->content !!}
        </div>
        <div class="show-back">
            <a href="{{ route('events.index') }}" class="vertical-link">Back to Events</a>
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
