<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function indexAllEvents(Request $request)
    {
        $user = $request->user();

        $events = Event::with('user', 'inscritos', 'inscritos.user')->orderBy('day')->get();


        collect($events)->map(function ($evnt, $index) use ($events, $user) {
            $events[$index]['imThere'] = false;
            collect($evnt->inscritos)->map(function ($inscritos) use ($user, $events, $index) {
                //error_log($evnt->id . ' ' . $inscritos->user_id);
                if ($inscritos->user_id === $user->id) {
                    $events[$index]['imThere'] = true;
                }
            });

            $events[$index]['countInscrits'] = $evnt->inscritos->count();
            $events[$index]['remaining'] = Carbon::now()->diffInDays(Carbon::parse($evnt->day), false);
        });

        return [
            'status' => 1,
            'user' => $user,
            'events' => $events,
        ];
    }

    public function deleteEvent(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'event_id' => 'required|exists:events,id'
        ]);

        $event = Event::find($validated['event_id']);

        if ($event->user_id !== $user->id) {
            return [
                'status' => 0,
                'message' => 'Este evento no es tuyo'
            ];
        }


        $event->delete();

        $result = (new EventController)->indexAllEvents($request);

        return [
            'status' => 1,
            'result' => $result,
        ];
    }

    public function createEvent(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'organization' => 'required',
            'adress' => 'required',
            'adress_adds' => 'required',
            'province' => 'required',
            'city' => 'required',
            'country' => 'required',
            'init_time' => 'required',
            'end_time' => 'required',
            'day' => 'required',
            'image' => 'required',
        ]);

        Event::create([
            'user_id' => $validated['user_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'organization' => $validated['organization'],
            'adress' => $validated['adress'],
            'adress_adds' => $validated['adress_adds'],
            'province' => $validated['province'],
            'country' => $validated['country'],
            'city' => $validated['city'],
            'init_time' => $validated['init_time'],
            'end_time' => $validated['end_time'],
            'day' => $validated['day'],
            'image' => $validated['image'],
        ]);

        return [
            'status' => 1,
            'message' => "Event succesfully created"
        ];
    }

    public function editEvent(Request $request, $id)
    {
        $event = Event::find($id);

        $validated = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'organization' => 'required',
            'adress' => 'required',
            'adress_adds' => 'required',
            'province' => 'required',
            'city' => 'required',
            'country' => 'required',
            'init_time' => 'required',
            'end_time' => 'required',
            'day' => 'required',
            'image' => 'required',
        ]);

        $event->user_id = $validated['user_id'];
        $event->title = $validated['title'];
        $event->description = $validated['description'];
        $event->organization = $validated['organization'];
        $event->adress = $validated['adress'];
        $event->adress_adds = $validated['adress_adds'];
        $event->province = $validated['province'];
        $event->country = $validated['country'];
        $event->city = $validated['city'];
        $event->init_time = $validated['init_time'];
        $event->end_time = $validated['end_time'];
        $event->day = $validated['day'];
        $event->image = $validated['image'];

        $event->save();

        return [
            'status' => 1,
            'message' => 'event updated'
        ];
    }
}
