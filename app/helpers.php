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

if (!function_exists("airportName")) {
    //make airport name bold
    function airportName(string $airport)
    {
        $preFix = substr($airport, 0, -7);
        $postFix = substr($airport, -7);
        return '<span class="text-info">' . $preFix . '</span>' . $postFix;
    }
}

if (!function_exists("getFile")) {
    function getFile($model)
    {
        Log::info($model->getFirstMedia());
        return $model->getFirstMedia() ? asset($model->getFirstMedia()->getUrl()) : URL::asset('assets/images/placeholder.png');
    }
}

if (!function_exists("getAvatar")) {
    function getAvatar($user)
    {
        return $user->getFirstMedia() ? asset($user->getFirstMedia()->getUrl()) : 'https://ui-avatars.com/api/?background=random&name=' . $user->name;
    }
}

if (!function_exists("getStatusColor")) {
    function getStatusColor($status)
    {
        switch ($status) {
            case 'pending':
                return 'warning';
                break;

            case 'approved':
                return 'success';
                break;

            case 'cancelled':
                return 'danger';
                break;
            default:
                return 'dark';
                break;
        }
    }
}

//return error message with file name and line number
if (!function_exists("showErrorMessage")) {
    function showErrorMessage($e)
    {
        // check env if its not in production, then show full message
        if (config('app.env') != 'production') {
            return $th->getMessage() . " in " . $e->getFile() . " at line " . $e->getLine();
        } else {
            return $th->getMessage();
        }
    }
}

if (!function_exists("getAvatar")) {
    function getAvatar($user)
    {
        return $user->getFirstMedia() ? asset($user->getFirstMedia()->getUrl()) : 'https://ui-avatars.com/api/?background=random&name=' . $user->name;
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
        return number_format($price, 0, '') . ' $';
    }
}

if (!function_exists("formatDate")) {
    function formatDate($date)
    {
        return Carbon::parse($date)->format("M d, Y");
    }
}

if (!function_exists("formatDateWithTimezone")) {
    function formatDateWithTimezone($date)
    {
        return Carbon::parse($date)->format("M d, Y - h:i a");
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
