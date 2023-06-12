<?php

namespace App\Orchid\Screens\Fund;

use App\Http\Requests\FundRequest;
use App\Models\Fund;
use App\Orchid\Layouts\Fund\FundListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class FundListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'funds' => Fund::filters()->defaultSort('fundName', 'asc')->paginate(20)
        ];
    }

    public function name(): ?string
    {
        return 'Список фондов';
    }

    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить фонд')->modal('createFund')->method('createOrUpdateFund')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            FundListTable::class,

            Layout::modal('createFund', Layout::rows([
                Input::make('fund.fundName')->required()->title('Название фонда'),
                Input::make('fund.numberFund')->required()->title('Номер фонда'),
                Input::make('fund.startDate')->required()->title('Начальная дата'),
                Input::make('fund.endDate')->required()->title('Конечная дата')                
            ]))->title('Создание фонда')->applyButton('Создать'),

            Layout::modal('editFund', Layout::rows([
                Input::make('fund.id')->type('hidden'),
                Input::make('fund.fundName')->required()->title('Название фонда'),
                Input::make('fund.numberFund')->required()->title('Номер фонда'),
                Input::make('fund.startDate')->required()->title('Начальная дата'),
                Input::make('fund.endDate')->required()->title('Конечная дата')
            ]))->async('asyncGetFund')
        ];
    }

    public function asyncGetFund(Fund $fund): array {
        return [
            'fund' => $fund
        ];
    }

    public function createOrUpdateFund(FundRequest $request): void {
        $fundId = $request->input('fund.id');
        Fund::updateOrCreate([
            'id' => $fundId
        ], $request->validated()['fund']);

        is_null($fundId) ? Toast::info('Фонд добавлен') : Toast::info('Фонд обновлён');
    }

    public function removeFund(Request $request): void
    {
        Fund::findOrFail($request->get('id'))->delete();

        Toast::info('Фонд удалён');
    }
}
