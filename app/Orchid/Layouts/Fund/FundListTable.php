<?php

namespace App\Orchid\Layouts\Fund;

use App\Models\Fund;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
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
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),            
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Fund $fund) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editFund')
                            ->method('createOrUpdateFund')
                            ->modalTitle('Редактирование фонда')
                            ->icon('pencil')
                            ->asyncParameters([
                                'fund' => $fund->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный фонд?')
                            ->method('removeFund', [
                                'id' => $fund->id
                            ]),
                    ])),
        ];
    }
}
