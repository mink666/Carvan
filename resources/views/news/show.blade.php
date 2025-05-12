@extends('layouts.app')

@section('title', $latestNews->title)

@section('content')
    <div class="news-show-page modern-show">
        <div class="show-image">
            @if ($latestNews->image)
                <img src="{{ asset('storage/' . $latestNews->image) }}" alt="{{ $latestNews->title }}">
            @else
                <img src="{{ asset('images/no-image.png') }}" alt="No image">
            @endif
        </div>
        <div class="show-header">
            <div class="show-meta">
                <span class="show-date"><i class="far fa-calendar"></i> {{ $latestNews->date->format('d M Y') }}</span>
            </div>
            <h1 class="show-title">{{ $latestNews->title }}</h1>
        </div>
        <div class="show-content">
            {!! $latestNews->content !!}
        </div>
        <div class="show-back">
            <a href="{{ route('news.index') }}" class="vertical-link">Back to News</a>
        </div>
    </div>
@endsection
