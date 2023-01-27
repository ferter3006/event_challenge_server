<?php

namespace App\Http\Controllers;

use App\Models\Inscritos;
use Illuminate\Http\Request;

class InscritosController extends Controller
{
    public function inscrive(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $user = $request->user();

        $check = Inscritos::where('event_id', $validated['event_id'])->where('user_id', $user->id)->first();

        $check ? $check->delete() : Inscritos::create([
            'event_id' => $validated['event_id'],
            'user_id' => $user->id
        ]);

        $result = (new EventController)->indexAllEvents($request);

        return [
            'status' => 1,
            'result' => $result
        ];
    }
}
