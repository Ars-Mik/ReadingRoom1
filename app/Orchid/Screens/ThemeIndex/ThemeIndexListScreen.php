<?php

namespace App\Orchid\Screens\ThemeIndex;

use App\Http\Requests\ThemeIndexRequest;
use App\Models\ThemeIndex;
use App\Orchid\Layouts\ThemeIndex\ThemeIndexListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ThemeIndexListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'theme_indices' => ThemeIndex::filters()->defaultSort('themeName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Список тематических индексов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Создать индекс')->modal('createThemeIndex')->method('create')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            ThemeIndexListTable::class,
            Layout::modal('createThemeIndex', Layout::rows([
                Input::make('themeName')->required()->title('Название тематического индекса'),
            ]))->title('Создание тематического индекса')->applyButton('Создать')
        ];
    }

    public function create(ThemeIndexRequest $request): void {
        ThemeIndex::create(array_merge($request->validated(),[]));
    }
}
