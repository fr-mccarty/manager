<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public string $moduleName = 'App';
    public string $moduleNamePlural = 'Apps';
    public string $moduleUrl = 'apps';

    // Boolean
    public function setIsActiveAttribute($value) { $this->attributes["is_active"] = ($value ? 1 : 0); }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
