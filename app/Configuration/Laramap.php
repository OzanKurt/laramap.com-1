<?php

namespace App\Configuration;

class Laramap
{
    /**
     * @return array
     */
    public static function scriptVariables()
    {
        return [
            'csrfToken' => csrf_token(),
            'env' => config('app.env'),
            'gmaps_key' => env('GMAPS_KEY'),
            'mapbox_key' => env('MAPBOX_KEY'),
            'currentUser' => auth()->user(),
            'authCheck' => auth()->check(),
        ];
    }
}
