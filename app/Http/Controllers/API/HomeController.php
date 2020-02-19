<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\Event;
use App\Promo;
class HomeController extends Controller
{
    public function home()
    {
        $news = News::limit(8)->get();
        $data = [];
        foreach ($news as $key => $new) {
            $data['news'][]=[
                'id'=> $new->id,
                'title'=> $new->title,
                'image'=> url('/storage/' . $new->image),
                'url'=> url('/news/read/'.$new->slug),
                'view'=>$new->view,
                'created_at'=>$new->created_at->format('d F Y'),
                'created_by'=>$new->createdby->admin->name,
                'category'=>$new->category->makeHidden(['created_at','updated_at','pivot','slug'])

            ];
        }

        $events = Event::limit(8)->get();
        foreach ($events as $key => $event) {
            $data['event'][]=[
                'id'=> $event->id,
                'title'=> $event->title,
                'image'=> url('/storage/' . $event->image),
                'url'=> url('/event/read/'.$event->slug),
                'view'=>$event->view,
                'created_at'=>$event->created_at->format('d F Y'),
                'created_by'=>$event->createdby->admin->name,
                'category'=>$event->category->makeHidden(['created_at','updated_at','pivot','slug'])
            ];
        }

        $promos = Promo::limit(8)->get();
        foreach ($promos as $key => $promo) {
            $data['promo'][]=[
                'id'=> $promo->id,
                'title'=> $promo->name,
                'image'=> url('/storage/' . $promo->image),
                'description'=> $promo->description,
                'point'=>$promo->point,
                'total'=>$promo->total,
                'view'=>$promo->view,
                'created_at'=>$promo->created_at->format('d F Y'),
                'created_by'=>$promo->createdby->admin->name,

            ];
        }
        return response()->json($data, 200);

    }
}
