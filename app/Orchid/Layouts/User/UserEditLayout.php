<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class UserEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('user.second_name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Фамилия')
                ->placeholder('Фамилия'),

            Input::make('user.name')
            ->type('text')
            ->max(255)
            ->required()
            ->title('Имя')
            ->placeholder('Имя'),

            Input::make('user.third_name')
            ->type('text')
            ->max(255)
            ->required()
            ->title('Отчество')
            ->placeholder('Отчество'),

            Input::make('user.email')
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
        ];
    }
}
