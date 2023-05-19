<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use App\Filter\Filterable as MyFilterable;
use App\Http\Filters\DocumentFilter;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Document extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use MyFilterable;

    public static string $QueryFilterClass = DocumentFilter::class;

    protected $fillable = ['id', 'documentName', 'fileName', 'fund_id', 'date', 'access',];

    protected $allowedSorts = [
        'documentName', 'date'
    ];

    protected $allowedFilters = [
        'documentName'
    ];

    public function fund(): BelongsTo{
        return $this->belongsTo(Fund::class);
    }
    public function themes(): BelongsToMany{
        return $this->belongsToMany(ThemeIndex::class, 'document_theme_indices');
    }


}
