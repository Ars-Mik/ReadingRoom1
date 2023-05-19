<?php


namespace App\Http\Filters\DocumentFilterCase;

use App\Filter\CaseFilter;

class NameDocumentCase extends CaseFilter
{


    public static string $NAME_QUERY_FIELD = 'fundName';

    function apply($builder, $value) {

        $builder->whereHas('fund', function ($query) use ($value){
       /*  dd($value); */
        /* $builder->whereIn('funds.fundName', $value); */
        foreach($value as $item) {
           /*  dd($item); */
                $query->where('fundName', $item);

        }
    });
    }


}
