@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>
        <div class="text-gray-500 text-sm mb-4">{{ $news->date }}</div>
        @if ($news->image)
            <img src="{{ asset('storage/' . $news->image) }}" alt="Image"
                class="mb-4 rounded-lg w-full max-h-96 object-cover">
        @endif
        <div class="prose max-w-none">{!! $news->content !!}</div>
        <a href="{{ route('user.news.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">&larr; Back to
            News</a>
    </div>
@endsection
