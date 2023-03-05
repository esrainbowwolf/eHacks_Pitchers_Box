<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtBat;
use App\Models\Pitchers;
use App\Models\Batters;

class AtBatController extends Controller
{
    public function store(Request $request)
    {
        $pitcher = Pitchers::where('name', $request->Pitcher)->first();
        if ($pitcher == null) {
            return \response(
                [
                    'error' => 'Pitcher not found',
                ],
                503);
        }
        $pitcherId = $pitcher->id;
        $batter = Batters::where('name', $request->Batter)->first();
        if ($batter == null) {
            return \response(
                [
                    'error' => 'Batter not found',
                ],
                503);
        }
        $batterId = $batter->id;
  
        $atBat = new AtBat();
        $atBat->pid = $pitcherId;
        $atBat->bid = $batterId;
        $atBat->outcome = $request->atBat;
        $atBat->pitches = 0;
        $atBat->save();

        return \response(
            [
                'atBat' => $atBat,
            ],
            200);
    }
}
