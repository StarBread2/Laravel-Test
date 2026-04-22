<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zoo;

class ZooController extends Controller
{
    // GET /api/zoos
    public function index()
    {
        return Zoo::all();
    }

    // POST /api/zoos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'habitat' => 'required|string|max:255',
        ]);

        $zoo = Zoo::create($validated);

        return response()->json($zoo, 201);
    }

    // GET /api/zoos/{id}
    public function show($id)
    {
        $zoo = Zoo::findOrFail($id);
        return $zoo;
    }

    // PUT/PATCH /api/zoos/{id}
    public function update(Request $request, $id)
    {
        $zoo = Zoo::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'species' => 'sometimes|string|max:255',
            'age' => 'sometimes|integer|min:0',
            'habitat' => 'sometimes|string|max:255',
        ]);

        $zoo->update($validated);

        return response()->json($zoo);
    }

    // DELETE /api/zoos/{id}
    public function destroy($id)
    {
        $zoo = Zoo::findOrFail($id);
        $zoo->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}