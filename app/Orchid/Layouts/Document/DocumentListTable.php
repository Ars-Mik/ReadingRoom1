<?php

namespace App\Orchid\Layouts\Document;

use App\Models\Document;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class DocumentListTable extends Table
{
    
    protected $target = 'documents';

    protected function columns(): iterable
    {
        return [
            TD::make('documentName', 'Название')->sort()->filter(TD::FILTER_TEXT),
            TD::make('fund_id', 'Фонд')->render(function(Document $document){
                return $document->fund->fundName;
            }),
            TD::make('', 'Географические индексы'),
            TD::make('', 'Тематические индексы'),  
            TD::make('', 'Именные индексы'),   
            TD::make('date', 'Дата появления')->defaultHidden()->sort(),         
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('', 'Действия'), 
        ];
    }
}
