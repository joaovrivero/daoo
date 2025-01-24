<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        return response()->json(Activity::all(), 200); // Retorna todas as atividades em JSON
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'max_participants' => 'required|integer|min:1',
        ]);

        $activity = Activity::create($validated);

        return response()->json($activity, 201); // Retorna a atividade criada com código 201
    }

    public function show(Activity $activity)
    {
        return response()->json($activity, 200); // Retorna a atividade específica
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'max_participants' => 'required|integer|min:1',
        ]);

        $activity->update($validated);

        return response()->json($activity, 200); // Retorna a atividade atualizada
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return response()->json(['message' => 'Activity deleted successfully'], 200);
    }
}
