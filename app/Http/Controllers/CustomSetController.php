<?php

namespace App\Http\Controllers;

use App\Models\CustomSet;
use App\Models\CustomSetPart;
use Illuminate\Http\Request;

class CustomSetController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Received request data:', $request->all());

        $request->validate([
            'custom_set_id' => 'required|uuid',
            'parts' => 'required|array',
            'parts.*.name' => 'required|string',
            'parts.*.part_number' => 'required|string',
            'parts.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            $customSet = CustomSet::create(['id' => $request->custom_set_id]);
            \Log::info('Custom set created:', ['id' => $customSet->id]);

            foreach ($request->parts as $part) {
                $createdPart = $customSet->parts()->create($part);
                \Log::info('Part created:', $createdPart->toArray());
            }

            return response()->json([
                'message' => 'Custom set created successfully',
                'custom_set_id' => $customSet->id
            ], 201);
        } catch (\Exception $e) {
            \Log::error('Error creating custom set:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Failed to create custom set'], 500);
        }
    }

    public function index()
    {
        $customSets = CustomSet::with('parts')->get();
        return response()->json($customSets);
    }
}
