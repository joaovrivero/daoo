<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function store(StoreActivityRequest $request)
    {
        $activity = Activity::create($request->validated());
        return new ActivityResource($activity);
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->validated());
        return new ActivityResource($activity);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json(['message' => 'Activity deleted successfully'], 200);
    }
}
