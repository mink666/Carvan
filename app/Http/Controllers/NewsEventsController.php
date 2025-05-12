<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use Illuminate\Http\Request;

class NewsEventsController extends Controller
{
    public function index()
    {
        $latestNews = News::orderBy('date', 'desc') ->take(4) ->get();
        $latestEvents = Event::orderBy('start_date', 'desc')->take(4)->get();
        return view('news_events.index', compact('latestNews', 'latestEvents'));
    }

    public function newsIndex()
    {
        $latestNews = News::orderBy('date', 'desc')->paginate(10);
        return view('news.index', compact('latestNews'));
    }

    public function newsShow($id)
    {
        $latestNews = News::findOrFail($id);
        return view('news.show', compact('latestNews'));
    }

    public function eventsIndex()
    {
        $latestEvents = Event::orderBy('start_date', 'desc')->paginate(10);
        return view('events.index', compact('latestEvents'));
    }

    public function eventsShow($id)
    {
        $latestEvents = Event::findOrFail($id);
        return view('events.show', compact('latestEvents'));
    }

}