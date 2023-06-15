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
                return $application->user->name;
            }),
            TD::make('Почта')->render(function(HistoryApplication $application){
                return $application->user->email;
            }),
            TD::make('document_id', 'Документ')->render(function(HistoryApplication $application){
                return $application->document->documentName;
            }),
            TD::make('status', 'Доступ')->render(function(HistoryApplication $application){
                if($application->status == 1)
                    return 'Одобрен';
                else
                    return 'Отказано';
            }),
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
        ];
    }
}
