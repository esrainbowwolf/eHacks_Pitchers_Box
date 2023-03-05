<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pitchers;
use App\Models\Batters;


class GameController extends Controller
{
    
    public function pitchBat()
    {

      return 
      \response(
          [
              'pitchers' => Pitchers::all(),
              'batters' => Batters::all(),
          ],
          200);
  }


}
