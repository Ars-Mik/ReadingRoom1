<?php


namespace App\Http\Filters\DocumentFilterCase;

use App\Filter\CaseFilter;

class NameIndexDocumentCase extends CaseFilter
{

    public static string $NAME_QUERY_FIELD = 'personName';

    function apply($builder, $value) {

        $builder->whereHas('nameIndexes', function ($query) use ($value){

        foreach($value as $item) {
                $query->where('personName', $item);

        }
    });
    }


}
