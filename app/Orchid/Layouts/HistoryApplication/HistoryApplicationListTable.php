<?php

namespace App\Orchid\Layouts\HistoryApplication;

use App\Models\HistoryApplication;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class HistoryApplicationListTable extends Table
{
    protected $target = 'history_applications';

    protected function columns(): iterable
    {
        return [
            TD::make('user_id', 'Пользователь')->render(function(HistoryApplication $application){
                return $application->user->fullName();
            })->width('300px'),
            TD::make('Почта')->render(function(HistoryApplication $application){
                return $application->user->email;
            })->width('200px'),
            TD::make('document_id', 'Документ')->render(function(HistoryApplication $application){
                return $application->document->documentName;
            })->width('400px'),
            TD::make('status', 'Доступ')->render(function(HistoryApplication $application){
                if($application->status == 1)
                    return 'Одобрен';
                else
                    return 'Отказано';
            }),
            TD::make('created_at', 'Дата создания')->defaultHidden()
            ->render(fn (HistoryApplication $application) => $application->created_at->toDateTimeString()),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
            ->render(fn (HistoryApplication $application) => $application->updated_at->toDateTimeString()),
        ];
    }
}
