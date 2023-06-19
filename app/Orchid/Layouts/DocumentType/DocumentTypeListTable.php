<?php

namespace App\Orchid\Layouts\DocumentType;

use App\Models\DocumentType;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DocumentTypeListTable extends Table
{
    protected $target = 'document_types';

    protected function columns(): iterable
    {
        return [
            TD::make('typeName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('created_at', 'Дата создания')->defaultHidden()
            ->render(fn (DocumentType $documentType) => $documentType->created_at->toDateTimeString()),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
            ->render(fn (DocumentType $documentType) => $documentType->updated_at->toDateTimeString()),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (DocumentType $documentType) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editDocumentType')
                            ->method('createOrUpdateDocumentType')
                            ->modalTitle('Редактирование вида документа')
                            ->icon('pencil')
                            ->asyncParameters([
                                'documentType' => $documentType->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный вид документа?')
                            ->method('removeDocumentType', [
                                'id' => $documentType->id
                            ]),
                    ])),
        ];
    }
}
