<?php

namespace App\Http\Controllers\Gaming;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use Tustin\PlayStation\Client as PlaystationClient;

class PlaystationSynController extends Controller
{
    /**
     * Run the profile sync for Playstation
     *
     * @returns void
     */
    public function index()
    {
        $playstationClient = new PlaystationClient();

        // Login with NPSSO token
        $playstationClient->loginWithNpsso(env('PSN_NPSSO_TOKEN'));

        // Get refresh token and store it in the database
        $playstationRefreshToken = $playstationClient->getRefreshToken()->getToken();
        $storedRefreshToken = Setting::where('name', 'psn_refresh_token')->first();
        if (!empty($storedRefreshToken)) {
            $storedRefreshToken->value = $playstationRefreshToken;
            $storedRefreshToken->save();
        }

        // Get the signed in user profile data
        $playstationUser = $playstationClient->users()->find(env('PSN_ACCOUNT_ID'));

        if (!empty($playstationUser)) {
            if (!empty($playstationUser->gameList())) {
                foreach ($playstationUser->gameList() as $key => $playstationGame) {

                    // First, check if the game already exists or not
                    $game = Game::where('playstation_id', $playstationGame->id())->first();
                    if (empty($game)) {
                        $game = new Game();
                    }

                    $game->playstation_id = $playstationGame->id();
                    $game->name = $playstationGame->name();
                    $game->localized_name = $playstationGame->localizedName();
                    $game->play_duration = $game->setPlayDuration($playstationGame->playDuration());

                    // Parse fist played date time
                    $firstPlayedDateTime = Carbon::parse($playstationGame->firstPlayedDateTime())->setTimezone('Europe/Amsterdam');
                    $game->first_played_date_time = $firstPlayedDateTime->toDateTimeString();

                    // Parse last played date time
                    $lastPlayedDateTime = Carbon::parse($playstationGame->lastPlayedDateTime())->setTimezone('Europe/Amsterdam');
                    $game->last_played_date_time = $lastPlayedDateTime->toDateTimeString();

                    $game->play_count = $playstationGame->playCount();
                    $game->category = $playstationGame->category();
                    $game->image_url = $playstationGame->imageUrl();

                    $game->save();
                }
            }
        }

        return redirect()->route('gaming.index')->with([
            'success' => 'Successfully ran the sync',
        ]);
    }
}
