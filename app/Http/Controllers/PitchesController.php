<?php

namespace App\Http\Controllers;
use App\Models\Pitches;
use App\Models\Pitchers;

use Illuminate\Http\Request;

class PitchesController extends Controller
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
        
        $pitch = new Pitches();
        $pitch->is_strike = $request->didSwing;
        $pitch->zone = $request->Zone;
        $pitch->speed = 0.0;
        $pitch->type = $request->Pitch;
        $pitch->pid = $pitcherId;
        $pitch->save();
        if ($pitch == null) {
            return \response(
                [
                    'error' => 'Pitch not found',
                ],
                503);
        }

        return \response(
            [
                'pitch' => $pitch,
            ],
            200);


    }
}
