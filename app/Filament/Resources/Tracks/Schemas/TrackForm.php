<?php

namespace App\Filament\Resources\Tracks\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;

class TrackForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Track')
                ->schema([
                    TextInput::make('title')
                        ->required(),

                    TextInput::make('slug_track')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    TextInput::make('duration')
                        ->numeric()
                        ->required(),

                    Select::make('album_id')
                        ->relationship('album', 'slug_album')
                        ->required(),
                ])
        ]);
    }
}

