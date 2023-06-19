<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use App\Http\Filters\FundFilter;
use Orchid\Filters\Filterable;
use App\Filter\Filterable as MyFilterable;

class Fund extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use MyFilterable;

    public static string $QueryFilterClass = FundFilter::class;

    protected $fillable = ['id', 'fundName', 'numberFund', 'startDate', 'endDate', ];

    protected $allowedSorts = [
        'fundName', 'numberFund'
    ];

    protected $allowedFilters = [
        'fundName', 'numberFund'
    ];

}
