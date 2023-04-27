<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class Document extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'documentName', 'file', 'fund_id', 'date', 'access',];

    protected $allowedSorts = [
        'documentName', 'date'
    ];

    protected $allowedFilters = [
        'documentName'
    ];

    public function fund(): BelongsTo{
        return $this->belongsTo(Fund::class);
    }
}
