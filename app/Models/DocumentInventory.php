<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class DocumentInventory extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'numberInventory', 'fund_id', ];

    protected $allowedSorts = [
        'numberInventory',
    ];

    protected $allowedFilters = [
        'numberInventory'
    ];

    public function fund(): BelongsTo{
        return $this->belongsTo(Fund::class);
    }

    public function getFullAttribute(): string
    {
        return $this->attributes['numberInventory'] . ' (' . $this->fund->fundName . ')';
    }
}
