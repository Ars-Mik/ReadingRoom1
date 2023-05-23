<?php

namespace App\Http\Filters;

use App\Filter\QueryFilter;
use App\Http\Filters\DocumentFilterCase\FundDocumentCase;
use App\Http\Filters\DocumentFilterCase\ThemeDocumentCase;
use App\Http\Filters\DocumentFilterCase\GeoDocumentCase;
use App\Http\Filters\DocumentFilterCase\NameIndexDocumentCase;
use App\Http\Filters\DocumentFilterCase\NameDocumentCase;

class DocumentFilter extends QueryFilter  {

    protected function init(): array{

        return [
            NameDocumentCase::class,
            FundDocumentCase::class,
            ThemeDocumentCase::class,
            GeoDocumentCase::class,
            NameIndexDocumentCase::class,
        ];
    }


}
