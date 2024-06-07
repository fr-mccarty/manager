<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pastoral Parish Global Constants
    |--------------------------------------------------------------------------
    |
    | Config::get('constants.date_for_humans_format')
    | use Illuminate\Support\Facades\Config;
    | Works with ->format() but must be cast to date or timestamp
    |
    */

    'date_for_humans_format' => 'M d, Y',
    'date_for_editing_format' => 'm/d/Y',

    'navigation_menu' => [
        ['label' => 'Dashboard', 'route' => 'dashboard'],

        // Insert Above
    ],
];
