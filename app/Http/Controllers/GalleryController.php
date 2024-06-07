<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function getGalleries()
    {
        $galleries = Gallery::all();


        $galleries->each(function ($gallery) {
            $gallery->imageLink = url('storage/images/' . $gallery->imageLink);
        });

        return response()->json($galleries);
    }

    public function createGallery(Request $request)
    {
        $rocnik = $request->post('rocnik');
        $imageLink = $request->post('imageLink');

        // Validate input fields
        $request->validate([
            'rocnik' => 'required',
            'imageLink' => 'required',
        ]);

        // Create a new gallery entry
        $newGallery = new Gallery();
        $newGallery->rocnik = $rocnik;
        $newGallery->imageLink = $imageLink;
        $newGallery->save();

        return response()->json(['message' => 'Gallery entry created successfully', 'gallery' => $newGallery], 200);
    }

    public function deleteGallery(int $id)
    {
        $gallery = Gallery::find($id);

        if ($gallery) {
            // Delete the gallery entry
            $gallery->delete();

            // Return success response
            return response()->json(['message' => 'Gallery entry deleted successfully'], 200);
        }

        // If the gallery entry with the given ID does not exist, return error response
        return response()->json(['error' => 'Gallery entry not found'], 404);
    }

    public function updateGallery(Request $request, int $id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['error' => 'Gallery entry not found'], 404);
        }

        // Validate input fields
        $request->validate([
            'rocnik' => 'required',
            'imageLink' => 'required',
        ]);

        $gallery->rocnik = $request->input('rocnik');
        $gallery->imageLink = $request->input('imageLink');
        $gallery->save();

        return response()->json(['message' => 'Gallery entry updated successfully', 'gallery' => $gallery], 200);
    }
}
