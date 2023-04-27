<?php

namespace App\Orchid\Layouts\ThemeIndex;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ThemeIndexListTable extends Table
{
    protected $target = 'theme_indices';

    protected function columns(): iterable
    {
        return [
            TD::make('themeName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
        ];
    }
}
