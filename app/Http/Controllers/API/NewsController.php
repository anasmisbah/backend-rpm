<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function allnews()
    {
        $news = News::all();
        foreach ($news as $key => $new) {
            $news[$key]->image = url('/storage/' . $new->image);
            $news[$key]->slug = url('/news/read/'.$new->slug);
        }

        return response()->json($news,200);
    }
}
