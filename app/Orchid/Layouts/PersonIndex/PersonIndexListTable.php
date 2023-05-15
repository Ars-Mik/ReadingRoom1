<?php

namespace App\Orchid\Layouts\PersonIndex;

use App\Models\PersonIndex;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
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
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (PersonIndex $personIndex) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editPersonIndex')
                            ->method('createOrUpdatePersonIndex')
                            ->modalTitle('Редактирование именного индекса')
                            ->icon('pencil')
                            ->asyncParameters([
                                'personIndex' => $personIndex->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный именной индекс?')
                            ->method('removePersonIndex', [
                                'id' => $personIndex->id
                            ]),
                    ])),
        ];
    }
}
