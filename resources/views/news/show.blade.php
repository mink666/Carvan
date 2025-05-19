@extends('layouts.app')

@section('title', $latestNews->title)

@section('content')
    <div class="news-show-page">
        <!-- Hero Banner Section -->
        <section class="ne-hero-section">
            <div class="ne-hero-banner">
                <div class="ne-slide">
                    @if ($latestNews->image)
                        <img src="{{ asset('images/' . $latestNews->image) }}" class="ne-slide-image"
                            alt="{{ $latestNews->title }}">
                    @else
                        <img src="{{ asset('images/news_events/default-news.jpg') }}" class="ne-slide-image"
                            alt="Default news image">
                    @endif
                    <div class="ne-slide-overlay"></div>
                </div>
            </div>
        </section>

        <div class="show-header-full-width">
            <div class="show-header-content">
                <div class="show-meta">
                    <span class="show-date"><i class="far fa-calendar"></i> {{ $latestNews->date->format('d M Y') }}</span>
                </div>
                <h1 class="show-title">{{ $latestNews->title }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="show-content">
                {!! $latestNews->content !!}
            </div>
            <div class="show-back">
                <a href="{{ route('news.index') }}" class="vertical-link">Back to News</a>
            </div>
        </div>
    </div>
@endsection
