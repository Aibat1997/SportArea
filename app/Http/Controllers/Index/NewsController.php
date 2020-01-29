<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at')->get();
        return view('index.news', compact('news'));
    }

    public function showById(News $news)
    {
        return view('index.news-inside', compact('news'));
    }
}
