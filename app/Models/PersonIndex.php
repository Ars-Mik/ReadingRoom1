<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;

class PersonIndex extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'personName',];

    protected $allowedSorts = [
        'personName'
    ];

    protected $allowedFilters = [
        'personName'
    ];

    public function documents(): BelongsToMany{
        return $this->belongsToMany(Document::class, 'document_person_indices');
    }
}
