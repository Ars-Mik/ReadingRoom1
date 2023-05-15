<?php

namespace App\Orchid\Layouts\Document;

use App\Models\Document;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;

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
            TD::make('Географические индексы')
            ->render(function(Document $document){
                $geo_indices_id = DB::table('document_geo_indices')
                ->where('document_id', $document->id)->get('geo_index_id');
                $geo_indices_name = "";
                foreach($geo_indices_id as $geo_index){
                    $geo_indices_name .= DB::table('geo_indices')
                    ->where('id', $geo_index->geo_index_id)->value('geoName');
                    $geo_indices_name .= ",<br>";
                }
                $geo_indices_name = mb_substr($geo_indices_name, 0, -5);
                return $geo_indices_name;
            }),
            TD::make('Тематические индексы')
            ->render(function(Document $document){
                $theme_indices_id = DB::table('document_theme_indices')
                ->where('document_id', $document->id)->get('theme_index_id');
                $theme_indices_name = "";
                foreach($theme_indices_id as $theme_index){
                    $theme_indices_name .= DB::table('theme_indices')
                    ->where('id', $theme_index->theme_index_id)->value('themeName');
                    $theme_indices_name .= ",<br>";
                }
                $theme_indices_name = mb_substr($theme_indices_name, 0, -5);
                return $theme_indices_name;
            }),  
            TD::make('Именные индексы')
            ->render(function(Document $document){
                $person_indices_id = DB::table('document_person_indices')
                ->where('document_id', $document->id)->get('person_index_id');
                $person_indices_name = "";
                foreach($person_indices_id as $person_index){
                    $person_indices_name .= DB::table('person_indices')
                    ->where('id', $person_index->person_index_id)->value('personName');
                    $person_indices_name .= ",<br>";
                }
                $person_indices_name = mb_substr($person_indices_name, 0, -5);
                return $person_indices_name;
            }),   
            TD::make('date', 'Дата появления')->defaultHidden()->sort(),
            TD::make('fileName', 'Название файла')->defaultHidden(),
            TD::make('access', 'Доступ')
            ->render(function(Document $document){
                if($document->access == 0)
                    return 'Закрытый доступ';
                else
                    return 'Общий доступ';
            })->defaultHidden(),         
            TD::make('created_at', 'Дата создания')->defaultHidden(),
            TD::make('updated_at', 'Дата обновления')->defaultHidden(),
            TD::make('action', 'Действия')
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Document $document) => DropDown::make()
                    ->icon('options-vertical')
                    ->list([

                        ModalToggle::make('Редактировать')
                            ->modal('editDocument')
                            ->method('createOrUpdateDocument')
                            ->modalTitle('Редактирование документа')
                            ->icon('pencil')
                            ->asyncParameters([
                                'document' => $document->id
                            ]),

                        Button::make('Удалить')
                            ->icon('trash')
                            ->confirm('Вы уверены, что хотите удалить данный документ?')
                            ->method('removeDocument', [
                                'id' => $document->id
                            ]),
                    ])), 
        ];
    }
}
