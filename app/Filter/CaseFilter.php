<?php


namespace App\Filter;


use Illuminate\Database\Eloquent\Builder;

abstract class CaseFilter
{
    public static string $NAME_QUERY_FIELD;

    abstract function apply(Builder $builder, $value);
}
