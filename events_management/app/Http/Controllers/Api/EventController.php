<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Gate;

class EventController implements HasMiddleware
{
    use CanLoadRelationships, AuthorizesRequests;

    private array $relations = ['user', 'attendees', 'attendees.user'];

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth:sanctum', except: ['index']),
            new Middleware('throttle:60,1')
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $events = Event::query();
        
        $this->loadRelationships($events);

        $events = $events->latest()
            ->paginate();

        return EventResource::collection($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time'
        ]);

        $event = Event::create([
            ...$data,
            'user_id' => $request->user()->id
        ]);

        return new EventResource($this->loadRelationships($event));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Event $event)
    {
        // $this->authorize('view', $event);
        if($request->user()->cannot('view', $event)){
            abort(403);
        }


        $event->load('attendees');

        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {   
        // if(!Gate::allows('update-event', $event)){
        //     abort(403, 'You are not authorized to updata this event.');
        // }
        $this->authorize('update-event', $event);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time'
        ]);

        $event->update([
            ...$data
        ]);

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response(status: 204);
    }
}
