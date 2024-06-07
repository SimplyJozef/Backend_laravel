<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Sponzor;
use App\Models\Speakers;
use App\Models\PovedaliONas;
use App\Models\StageInfo;

class AdminController extends Controller
{

    public function showAdminRozhranie(){

        $sponzors = Sponzor::all();
        $stages = Stage::all();
        $speakers = Speakers::all();
        $povedaliONasList = PovedaliONas::all();
        $stageInfo = StageInfo::all();


        return view('adminrozhranie', ['stages' => $stages,'sponzors' => $sponzors,'speakers' => $speakers,'povedaliONasList' => $povedaliONasList,'stageInfo' => $stageInfo ]);

    }












}
