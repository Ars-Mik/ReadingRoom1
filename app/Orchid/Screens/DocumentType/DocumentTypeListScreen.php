<?php

namespace App\Orchid\Screens\DocumentType;

use App\Http\Requests\DocumentTypeRequest;
use App\Models\DocumentType;
use App\Orchid\Layouts\DocumentType\DocumentTypeListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DocumentTypeListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'document_types' => DocumentType::filters()->defaultSort('typeName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Виды документов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать вид документа')->modal('createDocumentType')->method('createOrUpdateDocumentType')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            DocumentTypeListTable::class,

            Layout::modal('createDocumentType', Layout::rows([
                Input::make('documentType.typeName')->required()->title('Название вида документа'),
            ]))->title('Создание вида документа')->applyButton('Создать'),
            
            Layout::modal('editDocumentType', Layout::rows([
                Input::make('documentType.id')->type('hidden'),
                Input::make('documentType.typeName')->required()->title('Название вида документа'),
            ]))->async('asyncGetDocumentType')
        ];
    }

    public function asyncGetDocumentType(DocumentType $documentType): array {
        return [
            'documentType' => $documentType
        ];
    }

    public function createOrUpdateDocumentType(DocumentTypeRequest $request): void {
        $documentTypeId = $request->input('documentType.id');
        DocumentType::updateOrCreate([
            'id' => $documentTypeId
        ], $request->validated()['documentType']);

        is_null($documentTypeId) ? Toast::info('Вид документа добавлен') : Toast::info('Вид документа обновлён');
    }

    public function removeDocumentType(Request $request): void
    {
        DocumentType::findOrFail($request->get('id'))->delete();

        Toast::info('Вид документа удалён');
    }
}
