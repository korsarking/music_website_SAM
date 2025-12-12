<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Section::make('Basic info')
                ->columns(2)
                ->schema([
                    TextInput::make('name.en')->label('Name (EN)')->required(),
                    TextInput::make('name.ru')->label('Name (RU)')->required(),

                    TextInput::make('slug')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    Select::make('category_id')
                        ->relationship('category', 'slug')
                        ->required(),

                    Select::make('album_id')
                        ->relationship('album', 'slug_album')
                        ->nullable(),

                    Toggle::make('is_digital')
                        ->label('Digital product'),
                ]),

            Section::make('Description')
                ->schema([
                    Textarea::make('description.en')->label('Description (EN)'),
                    Textarea::make('description.ru')->label('Description (RU)'),
                ]),

            Section::make('Price & stock')
                ->columns(3)
                ->schema([
                    TextInput::make('price')->numeric()->required(),
                    TextInput::make('sale_price')->numeric()->nullable(),
                    TextInput::make('quantity')->numeric()->nullable(),
                ]),

            Section::make('Image')
                ->schema([
                    FileUpload::make('image')
                        ->directory('products')
                        ->image()
                        ->nullable(),
                ]),
        ]);
    }
}

