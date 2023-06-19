<?php

namespace App\Http\Filters;

use App\Filter\QueryFilter;
use App\Http\Filters\FundFilterCase\NumberFundCase;
use App\Http\Filters\FundFilterCase\NameFundCase;
use App\Http\Filters\FundFilterCase\GeoFundCase;

class FundFilter extends QueryFilter  {

    protected function init(): array{

        return [
            NumberFundCase::class,
            NameFundCase::class,
            GeoFundCase::class,
        ];
    }


}
