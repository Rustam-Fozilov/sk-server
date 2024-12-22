<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SavedResource\Pages;
use App\Models\Saved;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SavedResource extends Resource
{
    protected static ?string $label = "Saqlangan";

    protected static ?string $pluralLabel = "Saqlanganlar";

    protected static ?string $model = Saved::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('user_id')->label('Foydalanuvchi')->relationship('user', 'name')->required(),
                Forms\Components\TextInput::make('saveable_id')->label('Saveable ID')->required(),
                Forms\Components\Select::make('saveable_type')->label('Likeable Type')->options([
                    'App\Models\University' => 'University',
                    'App\Models\Blog' => 'Blog',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label('User')->searchable(),
                Tables\Columns\TextColumn::make('user.id')->label('UserID')->searchable(),
                Tables\Columns\TextColumn::make('saveable_type')->label('Searchable Type')->searchable(),
                Tables\Columns\TextColumn::make('saveable_id')->label('Searchable ID')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created At')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteAction::make(),
                ]),
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
            'index' => Pages\ListSaveds::route('/'),
            'create' => Pages\CreateSaved::route('/create'),
            'edit' => Pages\EditSaved::route('/{record}/edit'),
        ];
    }
}
