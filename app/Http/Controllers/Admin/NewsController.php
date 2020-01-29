<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Helpers;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.edit-news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'n_name' => 'required',
            'n_short_desc' => 'required',
            'n_description' => 'required',
            'n_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('n_img')) {
            $result = Helpers::storeImg('n_img', 'image', $request);
        }

        News::create([
            'n_name' => $request->n_name,
            'n_short_desc' => $request->n_short_desc,
            'n_description' => $request->n_description,
            'n_img' => $result
        ]);

        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit-news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'n_name' => 'required',
            'n_short_desc' => 'required',
            'n_description' => 'required'
        ]);

        if ($request->hasFile('n_img')) {
            $result = Helpers::storeImg('n_img', 'image', $request);
        }else{
            $result = $news->n_img;
        }

        $news->update([
            'n_name' => $request->n_name,
            'n_short_desc' => $request->n_short_desc,
            'n_description' => $request->n_description,
            'n_img' => $result
        ]);

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
    }
}
