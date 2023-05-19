<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var CaseFilter[]
     */
    protected array $cases;

    /**
     * @var array
     */
    protected array $allies;

    /**
     * @param array $requestFields
     */
    public function __construct(protected array $requestFields)
    {
        $this->cases = $this->init();
        $this->generateAlias();
    }

    abstract protected function init(): array;

    protected function generateAlias(): void
    {
        foreach ($this->cases as $case){
            $this->allies[$case::$NAME_QUERY_FIELD] = $case;
        }

    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->requestFields as $field => $value) {
            if (isset($this->allies[$field]) && isset($value)) {
                app($this->allies[$field])->apply($builder,$value);
            }
        }
    }
}
