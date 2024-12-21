<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LikedResource\Pages;
use App\Models\Liked;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LikedResource extends Resource
{
    protected static ?string $label = "Liked";

    protected static ?string $pluralLabel = "Liked";

    protected static ?string $model = Liked::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('user_id')->label('Foydalanuvchi')->relationship('user', 'name')->required(),
                Forms\Components\TextInput::make('likeable_id')->label('Likeable ID')->required(),
                Forms\Components\Select::make('likeable_type')->label('Likeable Type')->options([
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
                Tables\Columns\TextColumn::make('likeable_type')->label('Likeable Type')->searchable(),
                Tables\Columns\TextColumn::make('likeable_id')->label('Likeable ID')->searchable(),
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
            'index' => Pages\ListLikeds::route('/'),
            'create' => Pages\CreateLiked::route('/create'),
            'edit' => Pages\EditLiked::route('/{record}/edit'),
        ];
    }
}
