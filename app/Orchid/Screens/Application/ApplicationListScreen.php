<?php

namespace App\Orchid\Screens\Application;

use App\Models\Application;
use App\Models\HistoryApplication;
use App\Orchid\Layouts\Application\ApplicationListTable;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class ApplicationListScreen extends Screen
{
    public function query(): iterable
    {
        return [
            'applications' => Application::filters()->defaultSort('user_id', 'asc')->paginate(20),
        ];
    }

    public function name(): ?string
    {
        return 'Список заявок';
    }

    public function commandBar(): iterable
    {
        return [];
    }

    public function layout(): iterable
    {
        return [
            ApplicationListTable::class,
        ];
    }

    public function approveOrRejectApplication(Request $request): void
    {
        //dd($request);
        $request->validate([
            'user_id' => ['required'],
            'document_id' => ['required'],
            'status' => ['required'],
        ]);

        HistoryApplication::where('user_id', $request->get('user_id'))
        ->where('document_id', $request->get('document_id'))->delete();

        HistoryApplication::create([
            'user_id' => $request->user_id,
            'document_id' => $request->document_id,
            'status' => $request->status
        ]);

        Application::findOrFail($request->get('application_id'))->delete();

        if($request->status == 1)
            Toast::info('Заявка одобрена');
        else
            Toast::info('Заявка отклонена');
    }
}
