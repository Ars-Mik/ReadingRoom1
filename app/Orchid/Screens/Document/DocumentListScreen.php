<?php

namespace App\Orchid\Screens\Document;

use App\Http\Requests\DocumentRequest;
use Orchid\Screen\Screen;
use App\Models\Document;
use App\Models\DocumentGeoIndex;
use App\Models\DocumentInventory;
use App\Models\DocumentPersonIndex;
use App\Models\DocumentType;
use App\Models\Fund;
use App\Models\GeoIndex;
use App\Models\PersonIndex;
use App\Orchid\Layouts\Document\DocumentListTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Modal;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DocumentListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'documents' => Document::filters()->defaultSort('documentName', 'asc')->paginate(20),
        ];
    }

    public function name(): ?string
    {
        return 'Список документов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать документ')->modal('createDocument')->method('createOrUpdateDocument')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            DocumentListTable::class,
            Layout::modal('createDocument', Layout::rows([
                Group::make([
                    Input::make('document.documentName')->required()->title('Название документа'),
                    Input::make('file')->type('file')->required()->title('Файл'),
                ])->fullWidth(),
                Input::make('document.fileName')->type('hidden'),
                Group::make([
                    Relation::make('document.document_inventory_id')
                    ->fromModel(DocumentInventory::class, 'numberInventory')
                    ->required()->title('Номер описи')->displayAppend('full'),
                    Input::make('document.caseNumber')->required()->title('Номер дела'),
                ])->fullWidth(),
                Group::make([
                    Relation::make('geoIndex.id.')->fromModel(GeoIndex::class, 'geoName')->multiple()->required()->title('Географический указатель'),
                    Relation::make('personIndex.id.')->fromModel(PersonIndex::class, 'personName')->multiple()->required()->title('Именной указатель'),
                    Relation::make('document.document_type_id')->fromModel(DocumentType::class, 'typeName')->required()->title('Вид документа'),
                ])->fullWidth(),
                Group::make([
                    Input::make('document.year')->required()->title('Год'),
                    Select::make('document.month')
                    ->options([
                        1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь',
                        7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь',
                    ])
                    ->empty('Не выбрано', 0)->title('Месяц')->required(),
                    Select::make('document.day')
                    ->options([
                        1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06',
                        7 => '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12',
                        13 => '13', 14 => '14', 15 => '15', 16 => '16', 17 => '17', 18 => '18',
                        19 => '19', 20 => '20', 21 => '21', 22 => '22', 23 => '23', 24 => '24',
                        25 => '25', 26 => '26', 27 => '27', 28 => '28', 29 => '29', 30 => '30',
                        31 => '31',
                    ])
                    ->empty('Не выбрано', 0)->title('День')->required(),
                ])->fullWidth(),

                /*
                DateTimer::make('document.date')->required()->format('Y-m-d H:i:s')->allowInput()->title('Дата появления документа'),
                 */

                Select::make('document.access')
                ->options([
                    1 => 'Общий доступ',
                    0 => 'Закрытый доступ',
                ])
                ->title('Доступ к документу')->required()
            ]))->title('Создание документа')->applyButton('Создать')->size(Modal::SIZE_LG),

            Layout::modal('editDocument', Layout::rows([
                Input::make('document.id')->type('hidden'),
                Group::make([
                    Input::make('document.documentName')->required()->title('Название документа'),
                    Input::make('file')->type('file')->required()->title('Файл'),
                ])->fullWidth(),
                Input::make('document.fileName')->type('hidden'),
                Group::make([
                    Relation::make('document.document_inventory_id')
                    ->fromModel(DocumentInventory::class, 'numberInventory')
                    ->required()->title('Номер описи')->displayAppend('full'),
                    Input::make('document.caseNumber')->required()->title('Номер дела'),
                ])->fullWidth(),
                Group::make([
                    Relation::make('geoIndex.id.')->fromModel(GeoIndex::class, 'geoName')->multiple()->required()->title('Географический указатель'),
                    Relation::make('personIndex.id.')->fromModel(PersonIndex::class, 'personName')->multiple()->required()->title('Именной указатель'),
                    Relation::make('document.document_type_id')->fromModel(DocumentType::class, 'typeName')->required()->title('Вид документа'),
                ])->fullWidth(),
                Group::make([
                    Input::make('document.year')->required()->title('Год'),
                    Select::make('document.month')
                    ->options([
                        1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь',
                        7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь',
                    ])
                    ->empty('Не выбрано', 0)->title('Месяц')->required(),
                    Select::make('document.day')
                    ->options([
                        1 => '01', 2 => '02', 3 => '03', 4 => '04', 5 => '05', 6 => '06',
                        7 => '07', 8 => '08', 9 => '09', 10 => '10', 11 => '11', 12 => '12',
                        13 => '13', 14 => '14', 15 => '15', 16 => '16', 17 => '17', 18 => '18',
                        19 => '19', 20 => '20', 21 => '21', 22 => '22', 23 => '23', 24 => '24',
                        25 => '25', 26 => '26', 27 => '27', 28 => '28', 29 => '29', 30 => '30',
                        31 => '31',
                    ])
                    ->empty('Не выбрано', 0)->title('День')->required(),
                ])->fullWidth(),
                Select::make('document.access')
                ->options([
                    1 => 'Общий доступ',
                    0 => 'Закрытый доступ',
                ])
                ->title('Доступ к документу')->required()
            ]))->size(Modal::SIZE_LG)->async('asyncGetDocument')
        ];
    }

    public function asyncGetDocument(Document $document): array {
        return [
            'document' => $document
        ];
    }

    public function createOrUpdateDocument(DocumentRequest $request): void {
        //dd($request);
        $documentId = $request->input('document.id');
        Document::updateOrCreate([
            'id' => $documentId
        ], $request->validated()['document']);

        $check = false;

        if (is_null($documentId)){
            $check = true;
            $documentId = DB::table('documents')
            ->where('documentName', $request->input('document.documentName'))
            ->where('document_inventory_id', $request->input('document.document_inventory_id'))
            ->where('caseNumber', $request->input('document.caseNumber'))
            ->where('fileName', $request->input('document.fileName'))
            ->where('year', $request->input('document.year'))
            ->get('id');
            foreach($documentId as $temp){
                $documentId = $temp->id;
            }
        }
        else {
            DocumentGeoIndex::where('document_id', $documentId)->delete();
            DocumentPersonIndex::where('document_id', $documentId)->delete();
        }

        $geo_indices = $request->input('geoIndex.id');
        foreach($geo_indices as $geoIndex){
            DocumentGeoIndex::create([
                'document_id' => $documentId,
                'geo_index_id' => $geoIndex
            ], $request->validated()['geoIndex']);
        }

        $person_indices = $request->input('personIndex.id');
        foreach($person_indices as $personIndex){
            DocumentPersonIndex::create([
                'document_id' => $documentId,
                'person_index_id' => $personIndex
            ], $request->validated()['personIndex']);
        }

        $request->file('file')->storeAs("pdf/$documentId/", $request->input('document.fileName'));

        if($check)
            Toast::info('Документ добавлен');
        else
            Toast::info('Документ обновлён');
    }

    public function removeDocument(Request $request): void
    {
        DocumentGeoIndex::where('document_id', $request->get('id'))->delete();
        DocumentPersonIndex::where('document_id', $request->get('id'))->delete();
        Document::findOrFail($request->get('id'))->delete();

        Toast::info('Документ удалён');
    }
}
