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
            ModalToggle::make('Создать индекс')->modal('createGeoIndex')->method('create')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            GeoIndexListTable::class,
            Layout::modal('createGeoIndex', Layout::rows([
                Input::make('geoName')->required()->title('Название географического индекса')
            ]))->title('Создание географического индекса')->applyButton('Создать')
        ];
    }

    public function create(GeoIndexRequest $request): void {
        GeoIndex::create(array_merge($request->validated(),[]));
    }
}
