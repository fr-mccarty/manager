<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    public string $moduleName = 'App';
    public string $moduleNamePlural = 'Apps';
    public string $moduleUrl = 'apps';
}
