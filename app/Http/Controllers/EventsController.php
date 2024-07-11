<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Ticket;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
   public function create(){
    
    return view('organizer.createevent');

   }

   public function store(Request $request){
    $organizer_id = Auth::id();
    $request->validate([
        'name'=>'required|max:255',
        'description'=>'required|max:255',
        'start_time'=>'required|max:255',
        'end_time'=>'required|max:255',
        'videostsream'=>'required|max:255',
        'image'=>'required',
        'amount'=>'required|max:255',
        'price'=>'required|max:255',

    ]);
    $filename ="";
    if($request->hasFile('image')){
        $filename = $request->getSchemeAndHttpHost().'/images/'.time().'.'. $request->image->extension();
        $request->image->move(public_path('/images/'),$filename);
    }
        $event = Events::create([
            'organizer_id' => $organizer_id,
            'title' => $request->name,
            'start time' => $request->start_time,
            'description' => $request->description,
            'image_path' => $filename,
            'end time' => $request->end_time,
            'video_stream_url' => $request->videostsream,
            'capacity'=>0,
        ]);

        if($event){
        Ticket::create([
            'event_id' => $event->id,
            'ticket price' => $request->price,
            'ticket quantity' => $request->price,
        ]);
    }

   }
}
