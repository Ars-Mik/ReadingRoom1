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
            ModalToggle::make('Добавить фонд')->modal('createFund')->method('create')->icon('plus')
        ];
    }

    public function layout(): iterable
    {
        return [
            FundListTable::class,
            Layout::modal('createFund', Layout::rows([
                Input::make('fundName')->required()->title('Название фонда'),
                Input::make('numberFund')->required()->title('Номер фонда')                
            ]))->title('Создание фонда')->applyButton('Создать')
        ];
    }

    public function create(FundRequest $request): void {
        Fund::create(array_merge($request->validated(),[]));
    }
}
