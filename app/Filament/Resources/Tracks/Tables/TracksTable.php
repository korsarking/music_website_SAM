<?php

namespace App\Filament\Resources\Tracks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TracksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->limit(30),

                TextColumn::make('slug_track')
                    ->label('Slug parametre')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('duration')
                    ->label('Duration, sec')
                    ->numeric()
                    ->sortable()
                    ->sortable()
                    ->badge()
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->color('warning'),
                DeleteAction::make()
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
