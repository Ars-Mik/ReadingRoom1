<?php

namespace App\Orchid\Layouts\GeoIndex;

use App\Models\GeoIndex;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class GeoIndexListTable extends Table
{
    protected $target = 'geo_indices';

    protected function columns(): iterable
    {
        return [
            TD::make('geoName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden()
            ->render(fn (GeoIndex $geoIndex) => $geoIndex->created_at->toDateTimeString()),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
            ->render(fn (GeoIndex $geoIndex) => $geoIndex->updated_at->toDateTimeString()),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (GeoIndex $geoIndex) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editGeoIndex')
                            ->method('createOrUpdateGeoIndex')
                            ->modalTitle('Редактирование географического указателя')
                            ->icon('pencil')
                            ->asyncParameters([
                                'geoIndex' => $geoIndex->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный географический указатель?')
                            ->method('removeGeoIndex', [
                                'id' => $geoIndex->id
                            ]),
                    ])),
        ];
    }
}
