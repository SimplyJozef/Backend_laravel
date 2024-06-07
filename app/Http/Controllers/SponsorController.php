<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sponzor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function createSponzor(Request $request)
    {
        $imageLink = $request->post('imageLink');
        $link = $request->post('link');

        if(empty($imageLink) || empty($link)) {
            return response()->json(['error' => 'Incorrect data'], 422);
        }

        $newSponzor = new Sponzor();
        $newSponzor->imageLink = $imageLink;
        $newSponzor->link = $link;
        $newSponzor->save();

        return response()->json(['message' => 'Sponzor created successfully', 'sponsor' => $newSponzor], 200);
    }

    public function deleteSponzor(int $id)
    {
        $sponzor = Sponzor::find($id);

        if ($sponzor) {
            // Delete the sponzor
            $sponzor->delete();

            // Return success response
            return response()->json(['message' => 'Sponzor deleted successfully'], 200);
        }

        // If the sponzor with the given ID does not exist, return error response
        return response()->json(['error' => 'Sponzor not found'], 404);
    }

    public function updateSponzor(Request $request, int $id)
    {
        $sponzor = Sponzor::find($id);

        if (!$sponzor) {
            return response()->json(['error' => 'Sponzor not found'], 404);
        }

        $imageLink = $request->input('imageLink');
        $link = $request->input('link');

        if(empty($imageLink) || empty($link)) {
            return response()->json(['error' => 'Incorrect data'], 422);
        }

        $sponzor->imageLink = $imageLink;
        $sponzor->link = $link;
        $sponzor->save();

        return response()->json(['message' => 'Sponzor updated successfully', 'sponsor' => $sponzor], 200);
    }

    public function getSponsors()
    {
        $sponsors = Sponzor::all();

        $sponsors->each(function ($sponsors) {
            $sponsors->image = url('storage/images/' . $sponsors->imageLink);
        });

        return response()->json($sponsors);
    }
}
