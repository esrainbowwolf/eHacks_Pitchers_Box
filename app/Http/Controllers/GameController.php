<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pitchers;
use App\Models\Batters;
use App\Models\Games;
use App\Models\Teams;


class GameController extends Controller
{
    
    public function pitchBat()
    {
      $gameData = Games::all();
      $gameDate = Games::where('id', 1)->first()->date;
      $gameTime = Games::where('id', 1)->first()->time;
      $teamName = Teams::where('id', $gameData[0]->away_team_id)->first()->name;
      return 
      \response(
          [
              'gameDate' => $gameDate,
              'gameTime' => $gameTime,
              'opposingTeam' => $teamName,
              'pitchers' => Pitchers::all(),
              'batters' => Batters::all(),
          ],
          200);
  }


}
