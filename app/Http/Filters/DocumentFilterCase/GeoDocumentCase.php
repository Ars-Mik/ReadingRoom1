<?php


namespace App\Http\Filters\DocumentFilterCase;

use App\Filter\CaseFilter;

class GeoDocumentCase extends CaseFilter
{

    public static string $NAME_QUERY_FIELD = 'geoName';

    function apply($builder, $value) {

        $builder->whereHas('geos', function ($query) use ($value){

        foreach($value as $item) {
                $query->where('geoName', $item);

        }
    });
    }


}