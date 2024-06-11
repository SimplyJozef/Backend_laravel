<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PovedaliONas;
use Illuminate\Http\Request;

class PovedaliONnasController extends Controller
{
    public function getPovedaliONas()
    {
        $povedaliONas = PovedaliONas::all();

        $povedaliONas->each(function ($povedaliONas) {
            $povedaliONas->image = url('storage/images/' . $povedaliONas->imageLink);
        });

        return response()->json($povedaliONas);
    }

    public function createPovedaliONas(Request $request)
    {
        $name = $request->post('name');
        $quote = $request->post('quote');
        $pozicia = $request->post('pozicia');
        $imageLink = $request->post('imageLink');


        $request->validate([
            'name' => 'required',
            'quote' => 'required',
            'pozicia' => 'required',
            'imageLink' => 'required',
        ]);


        $newPovedaliONas = new PovedaliONas();
        $newPovedaliONas->name = $name;
        $newPovedaliONas->quote = $quote;
        $newPovedaliONas->pozicia = $pozicia;
        $newPovedaliONas->imageLink = $imageLink;
        $newPovedaliONas->save();

        return response()->json(['message' => 'PovedaliONas created successfully', 'povedaliONas' => $newPovedaliONas], 200);
    }

    public function deletePovedaliONas(int $id)
    {
        $povedaliONas = PovedaliONas::find($id);

        if ($povedaliONas) {

            $povedaliONas->delete();


            return response()->json(['message' => 'PovedaliONas deleted successfully'], 200);
        }


        return response()->json(['error' => 'PovedaliONas not found'], 404);
    }

    public function updatePovedaliONas(Request $request, int $id)
    {
        $povedaliONas = PovedaliONas::find($id);

        if (!$povedaliONas) {
            return response()->json(['error' => 'PovedaliONas not found'], 404);
        }


        $request->validate([
            'name' => 'required',
            'quote' => 'required',
            'pozicia' => 'required',
            'imageLink' => 'required',
        ]);

        $povedaliONas->name = $request->input('name');
        $povedaliONas->quote = $request->input('quote');
        $povedaliONas->pozicia = $request->input('pozicia');
        $povedaliONas->imageLink = $request->input('imageLink');
        $povedaliONas->save();

        return response()->json(['message' => 'PovedaliONas updated successfully', 'povedaliONas' => $povedaliONas], 200);
    }
}
