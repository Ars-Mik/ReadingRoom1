<?php


namespace App\Http\Filters\FundFilterCase;

use App\Filter\CaseFilter;

class NameFundCase extends CaseFilter
{

    public static string $NAME_QUERY_FIELD = 'fundName';

    function apply($builder, $value) {

       $builder->where('funds.fundName','LIKE',"%{$value}%");

    }


}