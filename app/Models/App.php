<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    public string $moduleName = 'App';
    public string $moduleNamePlural = 'Apps';
    public string $moduleUrl = 'apps';

    public function scopeSearch($query, string $terms = null)
    {
        collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
            $term = '%' . $term . '%';
            $query->where('name', 'like', $term)
                ->orWhere('description', 'like', $term);
        });
    }

    // Boolean
    public function setIsActiveAttribute($value) { $this->attributes["is_active"] = ($value ? 1 : 0); }

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
