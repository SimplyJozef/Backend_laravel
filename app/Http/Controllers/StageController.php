<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{

    public function getStages() {
        $stages = Stage::all();
        return response()->json($stages);
    }

    public function deleteStage($id) {
        try {
            $stage = Stage::findOrFail($id);
            $stage->delete();
            return response()->json(['message' => 'Stage deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting stage: ' . $e->getMessage()], 500);
        }
    }

    public function createStage(Request $request)
    {
        $name = $request->post('name', null);
        $date = $request->post('date', null);

        if (empty($name) || empty($date)) {
            return response()->json(['error' => 'Incorrect data'], 422);
        }

        $newStage = new Stage();
        $newStage->name = $name;
        $newStage->date = $date;
        $newStage->save();

        // Return the newly created stage object in the response
        return response()->json(['message' => 'Stage created successfully', 'stage' => $newStage], 200);
    }



    public function updateStage(Request $request, int $id)
    {
        $stage = Stage::find($id);

        if (!$stage) {
            return response()->json(['error' => 'Stage not found'], 404);
        }

        $name = $request->input('name');
        $date = $request->input('date');

        if (empty($name) || empty($date)) {
            return response()->json(['error' => 'Incorrect data'], 422);
        }

        $stage->name = $name;
        $stage->date = $date;
        $stage->save();

        return response()->json(['message' => 'Stage updated successfully'], 200);
    }
}
