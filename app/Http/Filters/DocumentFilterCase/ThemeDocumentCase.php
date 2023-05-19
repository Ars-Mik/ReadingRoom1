<?php


namespace App\Http\Filters\DocumentFilterCase;

use App\Filter\CaseFilter;

class ThemeDocumentCase extends CaseFilter
{

    public static string $NAME_QUERY_FIELD = 'themeName';

    function apply($builder, $value) {

        $builder->whereHas('themes', function ($query) use ($value){

        foreach($value as $item) {
                $query->where('themeName', $item);

        }
    });
    }


}
