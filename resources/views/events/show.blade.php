@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <div class="container mx-auto py-8 max-w-2xl">
        <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
        <div class="text-gray-500 text-sm mb-4">{{ $event->start_date }} - {{ $event->end_date }}</div>
        <div class="prose max-w-none">{!! $event->content !!}</div>
        <a href="{{ route('user.events.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">&larr; Back to
            Events</a>
    </div>
@endsection
