<?php

namespace App\Filament\Resources\Albums\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Select;

class AlbumsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable(),

                TextColumn::make('path_image')
                    ->label('Сover')
                    ->size(80),

                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold')
                    ->limit(30),

                TextColumn::make('slug_album')
                    ->label('Slug parametre')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('released_at')
                    ->label('Release date')
                    ->date('d.m.Y')
                    ->sortable()
                    ->color(fn ($state) => $state?->isFuture() ? 'warning' : 'success'),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(50),

                TextColumn::make('views')
                    ->label('Views')
                    ->numeric()
                    ->sortable()
                    ->sortable()
                    ->badge()
                    ->color(fn ($state) => $state > 10000 ? 'danger' : ($state > 5000 ? 'warning' : 'gray')),
            ])

            ->filters([
                Filter::make('popular')
                    ->label('Popular')
                    ->form([
                        Select::make('level')
                            ->options([
                                '1000'  => '1 000+ просмотров',
                                '5000'  => '5 000+ просмотров',
                                '10000' => '10 000+ просмотров',
                                '30000' => '30 000+ просмотров',
                            ])
                    ->placeholder('All albums')
                    ])
                    ->query(fn (Builder $query, array $data): Builder =>
                    filled($data['level'] ?? null)
                        ? $query->where('views', '>=', $data['level'])
                        : $query)
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
            ])
            ->defaultSort('released_at', 'desc');
    }
}
