<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Event;
class NewsController extends Controller
{
    public function allnews()
    {
        $news = News::all();
        $data = [];
        foreach ($news as $key => $new) {
            $data['news'][]=[
                'id'=> $new->id,
                'title'=> $new->title,
                'image'=> url('/storage/' . $new->image),
                'url'=> url('/news/read/'.$new->slug),
                'created_at'=>$new->created_at->format('d F Y'),
                'category'=>$new->category->makeHidden(['created_at','updated_at','pivot','slug'])
            ];
        }

        $events = Event::all();
        foreach ($events as $key => $event) {
            $data['event'][]=[
                'id'=> $event->id,
                'title'=> $event->title,
                'image'=> url('/storage/' . $event->image),
                'url'=> url('/event/read/'.$event->slug),
                'created_at'=>$event->created_at->format('d F Y'),
                'category'=>$event->category->makeHidden(['created_at','updated_at','pivot','slug'])
            ];
        }

        return response()->json($data,200);
    }

    public function detail($id)
    {
        $news = News::where('id',$id)->first();
        if (!$news) {
                return response()->json([
                    'status'=>false,
                    'message'=>'news not found'
                ],404);
        }
        $data=[
            'id'=> $news->id,
            'title'=> $news->title,
            'image'=> url('/storage/' . $news->image),
            'url'=> url('/news/read/'.$news->slug),
            'created_at'=>$news->created_at->format('d F Y'),
            'category'=>$news->category->makeHidden(['created_at','updated_at','pivot','slug'])
        ];
        return response()->json($data,200);
    }
}
