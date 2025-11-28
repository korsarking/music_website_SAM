<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
            Section::make('Basic info')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('username')
                        ->label('Username')
                        ->unique(ignoreRecord: true)
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->email()
                        ->label('Email')
                        ->unique(ignoreRecord: true)
                        ->required(),

                    FileUpload::make('avatar_slug')
                        ->label('Avatar')
                        ->image()
                        ->directory('')
                        ->avatar()
                        ->imageEditor()
                        ->imageEditorAspectRatios(['1:1'])
                        ->nullable(),
                ]),

            Section::make('Password')
                ->collapsible()
                ->collapsed()
                ->schema([
                    TextInput::make('password')
                        ->password()
                        ->label('New password')
                        ->dehydrateStateUsing(fn ($state) => $state ? Hash::make($state) : null)
                        ->dehydrated(fn ($state) => filled($state))
                        ->confirmed()
                        ->nullable(),

                    TextInput::make('password_confirmation')
                        ->password()
                        ->label('Password confirmation')
                        ->dehydrated(false),
                ]),

            Section::make('Rights and social media')
                ->columns(2)
                ->schema([
                    Toggle::make('role')
                        ->label('Administrator')
                        ->helperText('Add administrator')
                        ->inline(false),

                    TextInput::make('social_twitter')
                        ->label('Twitter')
                        ->url()
                        ->prefix('https://twitter.com/'),

                    TextInput::make('social_instagram')
                        ->label('Instagram')
                        ->url()
                        ->prefix('https://instagram.com/'),

                    TextInput::make('social_youtube')
                        ->label('YouTube')
                        ->url()
                        ->prefix('https://youtube.com/@'),

                    TextInput::make('social_website')
                        ->label('Website')
                        ->url(),
                ]),
            ]);
    }
}
