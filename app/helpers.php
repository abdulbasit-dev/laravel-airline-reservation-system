<?php

use Carbon\Carbon;
use GuzzleHttp\Psr7\Uri;

if (!function_exists("singular")) {
    //make title singuler
    function singular(string $title)
    {
        return substr($title, 0, -1);
    }
}

if (!function_exists("getFile")) {
    function getFile($model)
    {
        return $model->getFirstMedia() ? asset($model->getFirstMedia()->getUrl()) : URL::asset('images/placeholder.png');
    }
}

//return error message with file name and line number
if (!function_exists("fullErrorMessage")) {
    function fullErrorMessage($e)
    {
        // return "<p>" . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "</p>";
        return $e->getMessage() . "\n in file " . $e->getFile() . "\n at line " . $e->getLine();
    }
}

if (!function_exists("getDayDiff")) {
    function getDayDiff($data)
    {
        $expire_at = Carbon::parse($data);
        $now = Carbon::now();
        $diff = $now->diffInDays($expire_at, false);
        return $diff;
    }
}

if (!function_exists("formatPrice")) {
    function formatPrice($price)
    {
        return number_format($price, 0, '') . ' IQD';
    }
}

if (!function_exists("formatDate")) {
    function formatDate($date)
    {
        return Carbon::parse($date)->format("M d, Y - h:i a");
    }
}

if (!function_exists("formatDateWithTimezone")) {
    function formatDateWithTimezone($date)
    {
        return Carbon::parse($date)->format("M d, Y");
    }
}

if (!function_exists("orderClass")) {
    function orderClass($status)
    {
        switch ($status) {
            case 'ordered':
                $class = "primary";
                break;
            case 'accepted':
                $class = "success";
                break;
            case 'canceled':
                $class = "danger";
                break;

            default:
                $class = "primary";
                break;
        }

        return $class;
    }
}
