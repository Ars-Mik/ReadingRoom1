<?php


namespace App\Http\Filters\DocumentFilterCase;

use App\Filter\CaseFilter;

class NameDocumentCase extends CaseFilter
{


    public static string $NAME_QUERY_FIELD = 'documentName';

    function apply($builder, $value) {

       $builder->where('documents.documentName','LIKE',"%{$value}%");

    }


}
