<?php

namespace App\Orchid\Layouts\ThemeIndex;

use App\Models\ThemeIndex;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
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
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (ThemeIndex $themeIndex) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editThemeIndex')
                            ->method('createOrUpdateThemeIndex')
                            ->modalTitle('Редактирование тематического индекса')
                            ->icon('pencil')
                            ->asyncParameters([
                                'themeIndex' => $themeIndex->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный тематический индекс?')
                            ->method('removeThemeIndex', [
                                'id' => $themeIndex->id
                            ]),
                    ])),
        ];
    }
}
