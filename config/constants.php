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

    'apps_directory' => '/Users/joshmccarty/Code-2022M1/',

    'navigation_menu' => [
        ['label' => 'Dashboard', 'route' => 'dashboard'],
        ['label' => 'Apps', 'route' => 'apps.index'],
        ['label' => 'Global Utilities', 'route' => 'global-utilities'],

        // Insert Above
    ],
];
