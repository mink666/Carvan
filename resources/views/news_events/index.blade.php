@extends('layouts.app')

@section('title', 'News & Events')

@section('content')
    <div class="container mx-auto py-10 px-2 md:px-0">
        <h1 class="text-4xl font-extrabold mb-10 text-center text-gray-800 tracking-tight">News & Events</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- News Section -->
            <div>
                <h2 class="text-2xl font-bold mb-6 text-blue-700 flex items-center gap-2">
                    <svg class="w-7 h-7 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h2l2-2h6l2 2h2a2 2 0 012 2v12a2 2 0 01-2 2z" />
                    </svg>
                    Latest News
                </h2>
                @php $latestNews = \App\Models\News::orderBy('date', 'desc')->take(4)->get(); @endphp
                <div class="space-y-6">
                    @forelse($latestNews as $item)
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow flex flex-col md:flex-row overflow-hidden">
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="Image"
                                    class="w-full md:w-40 h-40 object-cover md:rounded-l-xl md:rounded-r-none rounded-t-xl md:rounded-t-none">
                            @endif
                            <div class="flex-1 p-5 flex flex-col">
                                <h3 class="text-lg font-bold mb-1 text-gray-800">{{ $item->title }}</h3>
                                <div class="text-gray-400 text-xs mb-2">{{ $item->date }}</div>
                                <div class="mb-3 text-gray-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($item->content), 100) }}</div>
                                <a href="{{ route('user.news.show', $item->id) }}"
                                    class="mt-auto inline-block text-blue-600 font-semibold hover:underline">Read more
                                    &rarr;</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500">No news found.</div>
                    @endforelse
                </div>
                <a href="{{ route('user.news.index') }}"
                    class="inline-block mt-6 text-blue-700 font-semibold hover:underline">View all News &rarr;</a>
            </div>
            <!-- Events Section -->
            <div>
                <h2 class="text-2xl font-bold mb-6 text-pink-700 flex items-center gap-2">
                    <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Upcoming Events
                </h2>
                @php $latestEvents = \App\Models\Event::orderBy('start_date', 'desc')->take(4)->get(); @endphp
                <div class="space-y-6">
                    @forelse($latestEvents as $item)
                        <div
                            class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-shadow flex flex-col md:flex-row overflow-hidden">
                            <div class="flex-1 p-5 flex flex-col">
                                <h3 class="text-lg font-bold mb-1 text-gray-800">{{ $item->title }}</h3>
                                <div class="text-gray-400 text-xs mb-2">{{ $item->start_date }} - {{ $item->end_date }}
                                </div>
                                <div class="mb-3 text-gray-600 line-clamp-3">
                                    {{ Str::limit(strip_tags($item->content), 100) }}</div>
                                <a href="{{ route('user.events.show', $item->id) }}"
                                    class="mt-auto inline-block text-pink-600 font-semibold hover:underline">Read more
                                    &rarr;</a>
                            </div>
                        </div>
                    @empty
                        <div class="text-gray-500">No events found.</div>
                    @endforelse
                </div>
                <a href="{{ route('user.events.index') }}"
                    class="inline-block mt-6 text-pink-700 font-semibold hover:underline">View all Events &rarr;</a>
            </div>
        </div>
    </div>
@endsection
