<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

class DocumentGeoIndex extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['document_id', 'geo_index_id',];

    public function document(): BelongsTo{
        return $this->belongsTo(Document::class);
    }

    public function geoIndex(): BelongsTo{
        return $this->belongsTo(GeoIndex::class);
    }
}
