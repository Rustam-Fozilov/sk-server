<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SearchHistoryResource\Pages;
use App\Models\SearchHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SearchHistoryResource extends Resource
{
    protected static ?string $label = "Qidiruv Tarixi";

    protected static ?string $pluralLabel = "Qidiruv Tarixi";

    protected static ?string $model = SearchHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')->label('User ID')->required(),
                Forms\Components\TextInput::make('searchable_id')->label('Searchable ID')->required(),
                Forms\Components\TextInput::make('searchable_type')->label('Searchable Type')->required(),
                Forms\Components\TextInput::make('searched_at')
                    ->label('Searched At')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('User')->searchable(),
                Tables\Columns\TextColumn::make('user.id')->label('UserID')->searchable(),
                Tables\Columns\TextColumn::make('searchable_type')->label('Searchable Type')->searchable(),
                Tables\Columns\TextColumn::make('searchable_id')->label('Searchable ID')->searchable(),
                Tables\Columns\TextColumn::make('searched_at')->label('Searched At')->dateTime(),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSearchHistories::route('/'),
            'create' => Pages\CreateSearchHistory::route('/create'),
            'edit' => Pages\EditSearchHistory::route('/{record}/edit'),
        ];
    }
}
