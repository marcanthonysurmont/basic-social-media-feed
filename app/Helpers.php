<?php

namespace App;
use Carbon\Carbon;
class Helpers
{

    public static function timeAgo($createdAt)
    {
        $postCreatedAt = Carbon::parse($createdAt);
        $now = Carbon::now();

        $timeDifferenceMinutes = $postCreatedAt->diffInMinutes($now);

        if ($timeDifferenceMinutes < 2) {
            return 'now';
        }

        if ($timeDifferenceMinutes < 60) {
            return round($timeDifferenceMinutes, 0) . 'm';
        }

        if ($timeDifferenceMinutes < 1440) {
            $timeDifferenceHours = $postCreatedAt->diffInHours($now);
            return round($timeDifferenceHours, 0) . 'h';
        }

        $timeDifferenceDays = $postCreatedAt->diffInDays($now);
        return round($timeDifferenceDays, 0) . 'd';
    }
}

