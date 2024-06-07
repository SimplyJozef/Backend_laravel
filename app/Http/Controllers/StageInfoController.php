<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StageInfo;
use Illuminate\Http\Request;

class StageInfoController extends Controller
{
    public function getStageInfo($stage_id)
    {
        // Fetch StageInfo records where stage_id matches the given $stage_id
        $stageInfo = StageInfo::where('stage_id', $stage_id)->get();

        // Return the filtered StageInfo records
        return response()->json(['stage_info' => $stageInfo], 200);
    }


    public function deleteStageInfo($id)
    {
        try {
            $stageInfo = StageInfo::findOrFail($id);
            $stageInfo->delete();
            return response()->json(['message' => 'Stage Info deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Stage Info: ' . $e->getMessage()], 500);
        }
    }
    public function createStageInfo(Request $request)
    {
        $stage_id = $request->input('stage_id');
        $cas_od = $request->input('cas_od');
        $cas_do = $request->input('cas_do');
        $nazov = $request->input('nazov');
        $popis = $request->input('popis');
        $speaker = $request->input('speaker');
        $firma = $request->input('firma');
        $max_capacity = $request->input('max_capacity');

        // You can add validation here if needed

        $newStageInfo = new StageInfo();
        $newStageInfo->stage_id = $stage_id;
        $newStageInfo->cas_od = $cas_od;
        $newStageInfo->cas_do = $cas_do;
        $newStageInfo->nazov = $nazov;
        $newStageInfo->popis = $popis;
        $newStageInfo->speaker = $speaker;
        $newStageInfo->firma = $firma;
        $newStageInfo->max_capacity = $max_capacity;
        $newStageInfo->save();

        // Return the newly created stage info object in the response
        return response()->json(['message' => 'Stage Info created successfully', 'stage_info' => $newStageInfo], 200);
    }


    public function updateStageInfo(Request $request, int $id)
    {
        $stageInfo = StageInfo::find($id);

        if (!$stageInfo) {
            return redirect()->route('adminrozhranie')->with('error', 'Stage Info not found');
        }

        $stage_id = $request->input('stage_id');
        $cas_od = $request->input('cas_od');
        $cas_do = $request->input('cas_do');
        $nazov = $request->input('nazov');
        $popis = $request->input('popis');
        $speaker = $request->input('speaker');
        $firma = $request->input('firma');
        $max_capacity = $request->input('max_capacity');

       // if (empty($cas_od) || empty($cas_do) || empty($nazov) || empty($popis) || empty($speaker) || empty($firma) || empty($max_capacity)) {
       #     return redirect()->route('adminrozhranie')->with('error', 'Incomplete data');
      #  }

        $stageInfo->stage_id = $stage_id;
        $stageInfo->cas_od = $cas_od;
        $stageInfo->cas_do = $cas_do;
        $stageInfo->nazov = $nazov;
        $stageInfo->popis = $popis;
        $stageInfo->speaker = $speaker;
        $stageInfo->firma = $firma;
        $stageInfo->max_capacity = $max_capacity;
        $stageInfo->save();

        return redirect()->route('adminrozhranie')->with('success', 'Stage Info updated successfully');
    }
}
