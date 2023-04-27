<?php

namespace App\Orchid\Layouts\PersonIndex;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PersonIndexListTable extends Table
{
    protected $target = 'person_indices';

    protected function columns(): iterable
    {
        return [
            TD::make('personName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
        ];
    }
}
