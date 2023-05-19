<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param array $filter
     */
    public function scopeFilter(Builder $builder, array $filter)
    {
        if (property_exists(self::class, 'QueryFilterClass') && isset(self::$QueryFilterClass)) {
            (new self::$QueryFilterClass($filter))->apply($builder);
        }
    }
}
