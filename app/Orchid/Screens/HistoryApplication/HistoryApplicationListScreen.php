<?php

namespace App\Orchid\Screens\HistoryApplication;

use App\Models\HistoryApplication;
use App\Orchid\Layouts\HistoryApplication\HistoryApplicationListTable;
use Orchid\Screen\Screen;

class HistoryApplicationListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'history_applications' => HistoryApplication::filters()->defaultSort('user_id', 'asc')->paginate(20),
        ];
    }

    public function name(): ?string
    {
        return 'История заявок';
    }

    public function commandBar(): iterable
    {
        return [];
    }

    public function layout(): iterable
    {
        return [
            HistoryApplicationListTable::class,
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'platform.history_applications',
        ];
    }
}
