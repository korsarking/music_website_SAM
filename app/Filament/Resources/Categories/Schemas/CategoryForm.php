<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->
            components([
                Section::make('Category')
                    ->schema([
                        TextInput::make('name.en')
                            ->label('Name (EN)')
                            ->required(),

                        TextInput::make('name.ru')
                            ->label('Name (RU)')
                            ->required(),

                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                ])
        ]);
    }
}
