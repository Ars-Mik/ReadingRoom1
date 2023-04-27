<?php

namespace App\Orchid\Screens\Document;

use Orchid\Screen\Screen;
use App\Models\Document;
use App\Models\Fund;
use App\Models\GeoIndex;
use App\Models\PersonIndex;
use App\Models\ThemeIndex;
use App\Orchid\Layouts\Document\DocumentListTable;
use DateTime;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Layouts\Modal;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DocumentListScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'documents' => Document::filters()->defaultSort('documentName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Список документов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать документ')->modal('createDocument')->method('create')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            DocumentListTable::class,
            Layout::modal('createDocument', Layout::rows([
                Input::make('documentName')->required()->title('Название документа'),
                Input::make('file')->required()->title('Файл'),
                Relation::make('fund_id')->fromModel(Fund::class, 'fundName')->required()->title('Фонд'),
                Relation::make('geo_indices_id')->fromModel(GeoIndex::class, 'geoName')->required()->title('Географический индекс'),
                Relation::make('person_indices_id')->fromModel(PersonIndex::class, 'personName')->required()->title('Именной индекс'),
                Relation::make('theme_indices_id')->fromModel(ThemeIndex::class, 'themeName')->required()->title('Тематический индекс'),
                DateTimer::make('date')->required()->format('Y-m-d')->title('Дата возникновения документа'),
                CheckBox::make('access')->required()->title('Общий доступ')
            ]))->title('Создание документа')->applyButton('Создать')->size(Modal::SIZE_LG)
        ];
    }

    public function create(Request $request): void {
        
        Toast::info('Документ создан');
    }
}
