<?php

namespace App\Http\Filters;

use App\Filter\QueryFilter;
use App\Http\Filters\DocumentFilterCase\NameDocumentCase;
use App\Http\Filters\DocumentFilterCase\ThemeDocumentCase;

class DocumentFilter extends QueryFilter  {

    protected function init(): array{

        return [
            NameDocumentCase::class,
            ThemeDocumentCase::class,
        ];
    }


}
