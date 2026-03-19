<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\AttendeeResource;

use App\Models\Event;
use App\Models\Attendee;

use App\Http\Traits\CanLoadRelationships;

class AttendeeController extends Controller
{
    private array $relations = ['user'];
    use CanLoadRelationships;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Event $event)
    {

        $attendees = $event->attendees()
            ->latest();

        $this->loadRelationships($attendees);

        $attendees = $attendees->paginate();

        return AttendeeResource::collection($attendees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {
        $attendee = $event->attendees()->create([
            'user_id' => 1
        ]);

        return new AttendeeResource($this->loadRelationships($attendee));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event, Attendee $attendee)
    {
        return new AttendeeResource($attendee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event, Attendee $attendee)
    {
        $attendee->delete();

        return response(status: 204);
    }
}
