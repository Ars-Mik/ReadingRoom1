<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class GeoIndex extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'geoName',];

    protected $allowedSorts = [
        'geoName'
    ];

    protected $allowedFilters = [
        'geoName'
    ];

    public function documents(): BelongsToMany{
        return $this->belongsToMany(Document::class, 'document_geo_indices');
    }
}
