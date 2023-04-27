<?php

namespace App\Orchid\Layouts\GeoIndex;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GeoIndexListTable extends Table
{
    protected $target = 'geo_indices';

    protected function columns(): iterable
    {
        return [
            TD::make('geoName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
        ];
    }
}
