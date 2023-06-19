<?php

namespace App\Orchid\Layouts\Application;

use App\Models\Application;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ApplicationListTable extends Table
{

    protected $target = 'applications';

    protected function columns(): iterable
    {
        return [
            TD::make('user_id', 'Пользователь')->render(function(Application $application){
                return $application->user->name;
            })->width('200px'),
            TD::make('Почта')->render(function(Application $application){
                return $application->user->email;
            })->width('200px'),
            TD::make('document_id', 'Документ')->render(function(Application $application){
                return $application->document->documentName;
            })->width('200px'),
            TD::make('created_at', 'Дата создания')->defaultHidden()
            ->render(fn (Application $application) => $application->created_at->toDateTimeString()),
            TD::make('updated_at', 'Дата обновления')->defaultHidden()
            ->render(fn (Application $application) => $application->updated_at->toDateTimeString()),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('294px')
                ->render(fn (Application $application) => Group::make([
                    Button::make('Одобрить')
                        ->icon('check')
                        ->confirm('Вы уверены, что хотите одобрить доступ к данному документу?')
                        ->method('approveOrRejectApplication', [                            
                            'application_id' => $application->id,
                            'user_id' => $application->user_id,
                            'document_id' => $application->document_id,
                            'status' => 1,
                        ]),

                    Button::make('Отклонить')
                        ->icon('cross')
                        ->confirm('Вы уверены, что хотите оклонить запрос на доступ к данному документу?')
                        ->method('approveOrRejectApplication', [                            
                            'application_id' => $application->id,
                            'user_id' => $application->user_id,
                            'document_id' => $application->document_id,
                            'status' => 0,
                        ]),
                ])), 
        ];
    }
}
