<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfirmCodeResource\Pages;
use App\Models\ConfirmCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConfirmCodeResource extends Resource
{
    protected static ?string $label = "Kod";

    protected static ?string $pluralLabel = "Kodlar";

    protected static ?string $model = ConfirmCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('user_id')->label('Foydalanuvchi')->relationship('user', 'name')->required(),
                Forms\Components\TextInput::make('code')->label('Kod')->required(),
                Forms\Components\Checkbox::make('is_used')->label('Foydalanilganmi?')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('user.name')->searchable(),
                Tables\Columns\TextColumn::make('code')->searchable(),
                Tables\Columns\BooleanColumn::make('is_used'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListConfirmCodes::route('/'),
            'create' => Pages\CreateConfirmCode::route('/create'),
            'edit' => Pages\EditConfirmCode::route('/{record}/edit'),
        ];
    }
}
