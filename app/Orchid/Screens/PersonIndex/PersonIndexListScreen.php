<?php

namespace App\Orchid\Screens\PersonIndex;

use App\Http\Requests\PersonIndexRequest;
use App\Models\PersonIndex;
use App\Orchid\Layouts\PersonIndex\PersonIndexListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PersonIndexListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'person_indices' => PersonIndex::filters()->defaultSort('personName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Список именных индексов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать индекс')->modal('createPersonIndex')->method('createOrUpdatePersonIndex')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            PersonIndexListTable::class,

            Layout::modal('createPersonIndex', Layout::rows([
                Input::make('personIndex.personName')->required()->title('Название именного индекса'),
            ]))->title('Создание именного индекса')->applyButton('Создать'),

            Layout::modal('editPersonIndex', Layout::rows([
                Input::make('personIndex.id')->type('hidden'),
                Input::make('personIndex.personName')->required()->title('Название именного индекса'),
            ]))->async('asyncGetPersonIndex')
        ];
    }

    public function asyncGetPersonIndex(PersonIndex $personIndex): array {
        return [
            'personIndex' => $personIndex
        ];
    }

    public function createOrUpdatePersonIndex(PersonIndexRequest $request): void {
        $personIndexId = $request->input('personIndex.id');
        PersonIndex::updateOrCreate([
            'id' => $personIndexId
        ], $request->validated()['personIndex']);

        is_null($personIndexId) ? Toast::info('Именной индекс добавлен') : Toast::info('Именной индекс обновлён');
    }

    public function removePersonIndex(Request $request): void
    {
        PersonIndex::findOrFail($request->get('id'))->delete();

        Toast::info('Именной индекс удалён');
    }
}
