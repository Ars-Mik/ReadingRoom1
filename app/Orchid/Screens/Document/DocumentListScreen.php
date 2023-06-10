<?php

namespace App\Orchid\Screens\Document;

use App\Http\Requests\DocumentRequest;
use Orchid\Screen\Screen;
use App\Models\Document;
use App\Models\DocumentGeoIndex;
use App\Models\DocumentPersonIndex;
use App\Models\DocumentThemeIndex;
use App\Models\Fund;
use App\Models\GeoIndex;
use App\Models\PersonIndex;
use App\Models\ThemeIndex;
use App\Orchid\Layouts\Document\DocumentListTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
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
                Input::make('document.documentName')->required()->title('Название документа'),
                Input::make('file')->type('file')->required()->title('Файл'),
                Input::make('document.fileName')->type('hidden'),
                Relation::make('document.fund_id')->fromModel(Fund::class, 'fundName')->required()->title('Фонд'),
                Relation::make('geoIndex.id.')->fromModel(GeoIndex::class, 'geoName')->multiple()->required()->title('Географический индекс'),
                Relation::make('personIndex.id.')->fromModel(PersonIndex::class, 'personName')->multiple()->required()->title('Именной индекс'),
                Relation::make('themeIndex.id.')->fromModel(ThemeIndex::class, 'themeName')->multiple()->required()->title('Тематический индекс'),
                DateTimer::make('document.date')->required()->format('Y-m-d H:i:s')->allowInput()->title('Дата появления документа'),
                Select::make('document.access')
                ->options([
                    1 => 'Общий доступ',
                    0 => 'Закрытый доступ',
                ])
                ->title('Доступ к документу')->required()
            ]))->title('Создание документа')->applyButton('Создать'),

            Layout::modal('editDocument', Layout::rows([
                Input::make('document.id')->type('hidden'),
                Input::make('document.documentName')->required()->title('Название документа'),
                Input::make('file')->type('file')->required()->title('Файл'),
                Input::make('document.fileName')->type('hidden'),
                Relation::make('document.fund_id')->fromModel(Fund::class, 'fundName')->required()->title('Фонд'),
                Relation::make('geoIndex.id.')->fromModel(GeoIndex::class, 'geoName')->multiple()->required()->title('Географический индекс'),
                Relation::make('personIndex.id.')->fromModel(PersonIndex::class, 'personName')->multiple()->required()->title('Именной индекс'),
                Relation::make('themeIndex.id.')->fromModel(ThemeIndex::class, 'themeName')->multiple()->required()->title('Тематический индекс'),
                DateTimer::make('document.date')->required()->format('Y-m-d H:i:s')->allowInput()->title('Дата появления документа'),
                Select::make('document.access')
                ->options([
                    1 => 'Общий доступ',
                    0 => 'Закрытый доступ',
                ])
                ->title('Доступ к документу')->required()
            ]))->async('asyncGetDocument')
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

        if (is_null($documentId)){
            $documentId = DB::table('documents')
            ->where('documentName', $request->input('document.documentName'))
            ->where('fund_id', $request->input('document.fund_id'))
            ->where('fileName', $request->input('document.fileName'))
            ->get('id');
            foreach($documentId as $temp){
                $documentId = $temp->id;
            }
        }
        else {
            DocumentGeoIndex::where('document_id', $documentId)->delete();
            DocumentThemeIndex::where('document_id', $documentId)->delete();
            DocumentPersonIndex::where('document_id', $documentId)->delete();
        }

        $geo_indices = $request->input('geoIndex.id');
        foreach($geo_indices as $geoIndex){
            DocumentGeoIndex::create([
                'document_id' => $documentId,
                'geo_index_id' => $geoIndex
            ], $request->validated()['geoIndex']);
        }
        $theme_indices = $request->input('themeIndex.id');
        foreach($theme_indices as $themeIndex){
            DocumentThemeIndex::create([
                'document_id' => $documentId,
                'theme_index_id' => $themeIndex
            ], $request->validated()['themeIndex']);
        }
        $person_indices = $request->input('personIndex.id');
        foreach($person_indices as $personIndex){
            DocumentPersonIndex::create([
                'document_id' => $documentId,
                'person_index_id' => $personIndex
            ], $request->validated()['personIndex']);
        }

        $request->file('file')->storeAs("pdf/$documentId/", $request->input('document.fileName'));

        is_null($documentId) ? Toast::info('Документ добавлен') : ('Документ обновлён');
    }

    public function removeDocument(Request $request): void
    {
        DocumentGeoIndex::where('document_id', $request->get('id'))->delete();
        DocumentThemeIndex::where('document_id', $request->get('id'))->delete();
        DocumentPersonIndex::where('document_id', $request->get('id'))->delete();
        Document::findOrFail($request->get('id'))->delete();

        Toast::info('Документ удалён');
    }
}
