<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;

class UsersTable
{
    
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('username')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('role')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('email_verified_at')
                    ->date('d.m.Y')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Filter::make('is_admin')
                    ->query(fn (Builder $query) => $query->where('role', true)),
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
