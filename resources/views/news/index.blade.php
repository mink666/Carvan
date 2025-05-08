@extends('layouts.app')

@section('title', 'News')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">News</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($news as $item)
                <div class="bg-white shadow rounded-lg p-4 flex flex-col">
                    <h2 class="text-lg font-semibold mb-2">{{ $item->title }}</h2>
                    <div class="text-gray-500 text-sm mb-2">{{ $item->date }}</div>
                    <div class="mb-2 line-clamp-3">{{ Str::limit(strip_tags($item->content), 100) }}</div>
                    <a href="{{ route('user.news.show', $item->id) }}" class="mt-auto text-blue-600 hover:underline">Read
                        more</a>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">No news found.</div>
            @endforelse
        </div>
        <div class="mt-6">{{ $news->links() }}</div>
    </div>
@endsection
