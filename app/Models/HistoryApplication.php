<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class HistoryApplication extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = ['id', 'user_id','document_id', 'status'];

    protected $allowedSorts = [
        'user_id', 'document_id'
    ];

    protected $allowedFilters = [
        'user_id', 'document_id'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function document(): BelongsTo{
        return $this->belongsTo(Document::class);
    }
}
