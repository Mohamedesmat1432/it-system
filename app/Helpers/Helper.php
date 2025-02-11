<?php

namespace App\Helpers;

use Carbon\Carbon;

class Helper
{

    public static function countDays($start, $end)
    {
        return Carbon::parse($start)->diffInDays(Carbon::parse($end), false);
    }

    public static function addMonthToDate($date, $count)
    {
        return Carbon::create($date)->addMonthsNoOverflow($count)->timezone("Africa/Cairo")->format("Y-m-d");
    }

    public static function formatHours($date)
    {
        return  $date ? Carbon::parse($date)->timezone("Africa/Cairo")->isoFormat("h:mm a") : '';
    }

    public static function formatDate($date)
    {
        return $date ? Carbon::parse($date)->timezone("Africa/Cairo")->format("Y-m-d") : '';
    }

    public static function formatFullDate($date)
    {
        return $date ? Carbon::parse($date)->timezone("Africa/Cairo")->isoFormat("Y-m-d h:mm a") : '';
    }

    public static function formatDateMonths($date)
    {
        return  $date ? Carbon::parse($date)->timezone("Africa/Cairo")->translatedFormat('F Y') : '';
    }
}
