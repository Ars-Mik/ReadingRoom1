<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Fund extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'fundName', 'numberFund', 'startDate', 'endDate', ];

    protected $allowedSorts = [
        'fundName', 'numberFund'
    ];

    protected $allowedFilters = [
        'fundName', 'numberFund'
    ];

}
