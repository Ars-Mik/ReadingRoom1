<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class DocumentType extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'typeName',];

    protected $allowedSorts = [
        'typeName'
    ];

    protected $allowedFilters = [
        'typeName'
    ];

    public function document(): BelongsTo{
        return $this->belongsTo(Document::class);
    }
}
