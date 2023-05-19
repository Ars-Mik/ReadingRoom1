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
            ModalToggle::make('Создать индекс')->modal('createThemeIndex')->method('createOrUpdateThemeIndex')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            ThemeIndexListTable::class,

            Layout::modal('createThemeIndex', Layout::rows([
                Input::make('themeIndex.themeName')->required()->title('Название тематического индекса'),
            ]))->title('Создание тематического индекса')->applyButton('Создать'),

            Layout::modal('editThemeIndex', Layout::rows([
                Input::make('themeIndex.id')->type('hidden'),
                Input::make('themeIndex.themeName')->required()->title('Название тематического индекса'),
            ]))->async('asyncGetThemeIndex')
        ];
    }

    public function asyncGetThemeIndex(ThemeIndex $themeIndex): array {
        return [
            'themeIndex' => $themeIndex
        ];
    }

    public function createOrUpdateThemeIndex(ThemeIndexRequest $request): void {
        $themeIndexId = $request->input('themeIndex.id');
        ThemeIndex::updateOrCreate([
            'id' => $themeIndexId
        ], $request->validated()['themeIndex']);

        is_null($themeIndexId) ? Toast::info('Тематический индекс добавлен') : Toast::info('Тематический индекс обновлён');
    }

    public function removeThemeIndex(Request $request): void
    {
        ThemeIndex::findOrFail($request->get('id'))->delete();

        Toast::info('Тематический индекс удалён');
    }
}
