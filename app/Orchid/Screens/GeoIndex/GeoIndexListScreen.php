<?php

namespace App\Orchid\Screens\GeoIndex;

use App\Http\Requests\GeoIndexRequest;
use App\Models\GeoIndex;
use App\Orchid\Layouts\GeoIndex\GeoIndexListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class GeoIndexListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'geo_indices' => GeoIndex::filters()->defaultSort('geoName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Список географических индексов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать индекс')->modal('createGeoIndex')->method('createOrUpdateGeoIndex')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            GeoIndexListTable::class,

            Layout::modal('createGeoIndex', Layout::rows([
                Input::make('geoIndex.geoName')->required()->title('Название географического индекса')
            ]))->title('Создание географического индекса')->applyButton('Создать'),

            Layout::modal('editGeoIndex', Layout::rows([
                Input::make('geoIndex.id')->type('hidden'),
                Input::make('geoIndex.geoName')->required()->title('Название географического индекса')
            ]))->async('asyncGetGeoIndex')
        ];
    }

    public function asyncGetGeoIndex(GeoIndex $geoIndex): array {
        return [
            'geoIndex' => $geoIndex
        ];
    }

    public function createOrUpdateGeoIndex(GeoIndexRequest $request): void {
        $geoIndexId = $request->input('geoIndex.id');
        GeoIndex::updateOrCreate([
            'id' => $geoIndexId
        ], $request->validated()['geoIndex']);

        is_null($geoIndexId) ? Toast::info('Географический индекс добавлен') : Toast::info('Географический индекс обновлён');
    }

    public function removeGeoIndex(Request $request): void
    {
        GeoIndex::findOrFail($request->get('id'))->delete();

        Toast::info('Географический индекс удалён');
    }
}
