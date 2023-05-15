<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Orchid\Screen\AsSource;

class DocumentThemeIndex extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = ['document_id', 'theme_index_id',];

    public function document(): BelongsTo{
        return $this->belongsTo(Document::class);
    }

    public function themeIndex(): BelongsTo{
        return $this->belongsTo(ThemeIndex::class);
    }
}
