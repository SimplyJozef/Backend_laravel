<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Speakers;
use Illuminate\Http\Request;

class SpeakersController extends Controller
{

    public function getSpeakers()
    {
        $speakers = Speakers::all();

        // Ensure the image URLs are correct
        $speakers->each(function ($speaker) {
            $speaker->image = url('storage/images/' . $speaker->imageLink);
        });

        return response()->json($speakers);
    }


    public function createSpeaker(Request $request)
    {
        $name = $request->post('name');
        $skusenosti = $request->post('skusenosti');
        $firma = $request->post('firma');
        $linkedIn = $request->post('linkedIn');
        $imageLink = $request->post('imageLink');

        // Validate input fields
        $request->validate([
            'name' => 'required',
            'skusenosti' => 'required',
            'firma' => 'required',
            'linkedIn' => 'required',
            'imageLink' => 'required',
        ]);

        // Create a new speaker
        $newSpeaker = new Speakers(); // Changed from Speaker to Speakers
        $newSpeaker->name = $name;
        $newSpeaker->skusenosti = $skusenosti;
        $newSpeaker->firma = $firma;
        $newSpeaker->linkedIn = $linkedIn;
        $newSpeaker->imageLink = $imageLink;
        $newSpeaker->save();

        return response()->json(['message' => 'Speaker created successfully', 'speaker' => $newSpeaker], 200);
    }

    public function deleteSpeaker(int $id)
    {
        $speaker = Speakers::find($id); // Changed from Speaker to Speakers

        if ($speaker) {
            // Delete the speaker
            $speaker->delete();

            // Return success response
            return response()->json(['message' => 'Speaker deleted successfully'], 200);
        }

        // If the speaker with the given ID does not exist, return error response
        return response()->json(['error' => 'Speaker not found'], 404);
    }

    public function updateSpeaker(Request $request, int $id)
    {
        $speaker = Speakers::find($id); // Changed from Speaker to Speakers

        if (!$speaker) {
            return response()->json(['error' => 'Speaker not found'], 404);
        }

        // Validate input fields
        $request->validate([
            'name' => 'required',
            'skusenosti' => 'required',
            'firma' => 'required',
            'linkedIn' => 'required',
            'imageLink' => 'required',
        ]);

        $speaker->name = $request->input('name');
        $speaker->skusenosti = $request->input('skusenosti');
        $speaker->firma = $request->input('firma');
        $speaker->linkedIn = $request->input('linkedIn');
        $speaker->imageLink = $request->input('imageLink');
        $speaker->save();

        return response()->json(['message' => 'Speaker updated successfully', 'speaker' => $speaker], 200);
    }
}
