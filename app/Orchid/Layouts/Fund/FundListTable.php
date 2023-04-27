<?php

namespace App\Orchid\Layouts\Fund;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FundListTable extends Table
{
    protected $target = 'funds';

    protected function columns(): iterable
    {
        return [
            TD::make('fundName', 'Название фонда')->sort()->filter(TD::FILTER_TEXT),
            TD::make('numberFund', 'Номер фонда')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
        ];
    }
}
