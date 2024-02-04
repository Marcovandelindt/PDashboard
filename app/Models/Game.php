<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'playstation_id',
        'name',
        'localized_name',
        'play_duration',
        'first_played_date_time',
        'last_played_date_time',
        'play_count',
        'category',
        'image_url',
    ];

    /**
     * Correctly set and format the play duration of a game
     *
     * @param string $playDuration
     *
     * @returns mixed
     */
    public function setPlayDuration(string $playDuration): mixed
    {
        preg_match('/PT(\d+H)?(\d+M)?(\d+S)?/', $playDuration, $matches);

        $hours = 0;
        $minutes = 0;
        $seconds = 0;

        if (isset($matches[1])) {
            $hours = intval(str_replace('H', '', $matches[1]));
        }
        if (isset($matches[2])) {
            $minutes = intval(str_replace('M', '', $matches[2]));
        }
        if (isset($matches[3])) {
            $seconds = intval(str_replace('S', '', $matches[3]));
        }

        $timeNotation = "";

        if ($hours > 0) {
            $timeNotation .= $hours . ":";
        } else {
            $timeNotation .= '00:';
        }

        if ($minutes > 0) {
            $timeNotation .= $minutes . ":";
        } else {
            $timeNotation .= '00:';
        }

        if ($seconds > 0) {
            $timeNotation .= $seconds;
        } else {
            $timeNotation .= "00";
        }

       	return $timeNotation;
    }
}
