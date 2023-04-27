<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class ThemeIndex extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'themeName', ];

    protected $allowedSorts = [
        'themeName'
    ];

    protected $allowedFilters = [
        'themeName'
    ];
}
