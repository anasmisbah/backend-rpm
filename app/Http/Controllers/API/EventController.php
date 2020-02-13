<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function allevents()
    {
        $events = Event::all();
        foreach ($events as $key => $new) {
            $events[$key]->image = url('/storage/' . $new->image);
            $events[$key]->slug = url('/event/read/'.$new->slug);
        }

        return response()->json($events,200);
    }
}
