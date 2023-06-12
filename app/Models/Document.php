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

    protected $fillable = ['id', 'documentName', 'caseNumber', 'fileName', 'document_inventory_id',
    'document_type_id', 'year', 'month', 'day', 'access',];

    protected $allowedSorts = [
        'documentName', 'year'
    ];

    protected $allowedFilters = [
        'documentName'
    ];

    /* public function fund(): BelongsTo{
        return $this->belongsTo(Fund::class);
    } */

    public function documentInventory(): BelongsTo{
        return $this->belongsTo(DocumentInventory::class);
    }

    public function documentType(): BelongsTo{
        return $this->belongsTo(DocumentType::class);
    }

    public function geos(): BelongsToMany{
        return $this->belongsToMany(GeoIndex::class, 'document_geo_indices');
    }

    public function nameIndexes(): BelongsToMany{
        return $this->belongsToMany(PersonIndex::class, 'document_person_indices');
    }

}
