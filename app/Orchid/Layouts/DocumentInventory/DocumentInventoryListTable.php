<?php

namespace App\Orchid\Layouts\DocumentInventory;

use App\Models\DocumentInventory;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DocumentInventoryListTable extends Table
{
    protected $target = 'document_inventories';

    protected function columns(): iterable
    {
        return [
            TD::make('numberInventory', 'Номер описи')->sort()->filter(TD::FILTER_TEXT)->width('200px'),
            TD::make('fund_id', 'Фонд')->render(function(DocumentInventory $inventory){
                return $inventory->fund->fundName;
            }),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (DocumentInventory $inventory) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editInventory')
                            ->method('createOrUpdateInventory')
                            ->modalTitle('Редактирование описи')
                            ->icon('pencil')
                            ->asyncParameters([
                                'documentInventory' => $inventory->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данную опись?')
                            ->method('removeInventory', [
                                'id' => $inventory->id
                            ]),
                    ])),
        ];
    }
}
