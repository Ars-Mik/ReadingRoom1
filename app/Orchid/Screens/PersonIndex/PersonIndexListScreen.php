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
            ModalToggle::make('Создать индекс')->modal('createPersonIndex')->method('create')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            PersonIndexListTable::class,
            Layout::modal('createPersonIndex', Layout::rows([
                Input::make('personName')->required()->title('Название именного индекса'),
            ]))->title('Создание именного индекса')->applyButton('Создать')
        ];
    }

    public function create(PersonIndexRequest $request): void {
        PersonIndex::create(array_merge($request->validated(),[]));
    }
}
