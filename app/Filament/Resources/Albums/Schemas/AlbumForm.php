<?php

namespace App\Filament\Resources\Albums\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class AlbumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic info')
                ->columns(2)
                ->schema([
                    TextInput::make('title.en')
                        ->label('Title (EN)')
                        ->required()
                        ->afterStateUpdated(fn ($state, $set) => 
                            filled($state) ? $set('slug_album', \Str::slug($state)) : null
                        ),

                    TextInput::make('title.ru')
                        ->label('Title (RU)')
                        ->required(),

                    TextInput::make('slug_album')
                        ->label('Slug parametre')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->maxLength(255)
                        ->helperText('Automatically generated from the title'),

                    DatePicker::make('released_at')
                        ->label('Release date')
                        ->displayFormat('d.m.Y')
                        ->weekStartsOnMonday()
                        ->maxDate(now()),

                    TextInput::make('views')
                        ->label('Views')
                        ->numeric()
                        ->default(0)
                        ->helperText('You can manually adjust'),
                ]),

            Section::make('Cover')
                ->collapsible()
                ->schema([
                    FileUpload::make('path_image')
                        ->label('Album cover')
                        ->image()
                        ->directory('')
                        ->imageEditor()
                        ->imageEditorAspectRatios(['1:1'])
                        ->required()
                ]),

            Section::make('Description')
                ->collapsible()
                ->schema([
                Textarea::make('description.en')
                    ->label('Description (EN)'),

                Textarea::make('description.ru')
                    ->label('Description (RU)'),                
                ]),
        ]);
    }
}
