<?php

namespace App\Http\Controllers\Gaming;

use App\Models\Game;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class GamingController extends Controller
{
    /**
     * Index action
     *
     * @returns View
     */
    public function index(): View
    {
        $games = Game::orderBy('last_played_date_time', 'DESC')->get();

        $data = [
            'title' => 'Gaming',
            'games' => $games,
        ];

        return view('gaming.index')->with($data);
    }
}
