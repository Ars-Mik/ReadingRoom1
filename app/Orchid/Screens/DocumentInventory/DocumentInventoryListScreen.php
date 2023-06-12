<?php

namespace App\Orchid\Screens\DocumentInventory;

use App\Http\Requests\DocumentInventoryRequest;
use App\Models\DocumentInventory;
use App\Models\Fund;
use App\Orchid\Layouts\DocumentInventory\DocumentInventoryListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class DocumentInventoryListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'document_inventories' => DocumentInventory::filters()->defaultSort('numberInventory', 'asc')->paginate(20),
        ];
    }

    public function name(): ?string
    {
        return 'Список описей';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать опись')->modal('createInventory')->method('createOrUpdateInventory')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            DocumentInventoryListTable::class,
            Layout::modal('createInventory', Layout::rows([
                Input::make('documentInventory.numberInventory')->required()->title('Номер описи'),             
                Relation::make('documentInventory.fund_id')->fromModel(Fund::class, 'fundName')->required()->title('Фонд'),
            ]))->title('Создание описи')->applyButton('Создать'),

            Layout::modal('editInventory', Layout::rows([
                Input::make('documentInventory.id')->type('hidden'),
                Input::make('documentInventory.numberInventory')->required()->title('Номер описи'),
                Relation::make('documentInventory.fund_id')->fromModel(Fund::class, 'fundName')->required()->title('Фонд'),
            ]))->async('asyncGetInventory')
        ];
    }

    public function asyncGetInventory(DocumentInventory $inventory): array {
        return [
            'documentInventory' => $inventory
        ];
    }

    public function createOrUpdateInventory(DocumentInventoryRequest $request): void {
        $inventoryId = $request->input('documentInventory.id');
        DocumentInventory::updateOrCreate([
            'id' => $inventoryId
        ], $request->validated()['documentInventory']);

        is_null($inventoryId) ? Toast::info('Опись добавлена') : Toast::info('Опись обновлена');
    }

    public function removeInventory(Request $request): void
    {
        DocumentInventory::findOrFail($request->get('id'))->delete();

        Toast::info('Опись удалена');
    }
}
