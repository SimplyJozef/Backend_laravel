<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        // Assuming you have an Image model with a 'path' attribute
        $images = Image::all(['id', 'path']); // Adjust attributes as necessary
        return response()->json($images);
    }
}
