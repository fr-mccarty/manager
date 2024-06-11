<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class %moduleName% extends Model
{
    public $moduleName = '%moduleName%';
    public $moduleNamePlural = '';
    public $moduleUrl = '';

    public function scopeSearch($query, string $terms = null)
    {
        collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
            $term = '%' . $term . '%';
            $query->where(function ($query) use ($term) {
                $query->where('first_name', 'like', $term)
                    ->orWhere('last_name', 'like', $term);
            });
        });
    }

}
