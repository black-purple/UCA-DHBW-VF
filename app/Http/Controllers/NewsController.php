<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
class NewsController extends Controller
{
    public function displayNews(Request $request)
    {
        $news = News::paginate(3);

        if ($request->ajax()) {
            return view('front.news.news', compact('news'));
        }

        return view('front.news.news', ['news' => $news]);
    }

    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->take(3)->get();

        return view('front.index', ['news' => $news]);
    }

    public function showNews(News $news)
    {
        return view('front.news.showNews', ['news' => $news]);
    }
}
