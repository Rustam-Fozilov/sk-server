<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UniversityResource\Pages;
use App\Models\University;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Query\Builder;

class UniversityResource extends Resource
{
    protected static ?string $label = "Universitet";

    protected static ?string $pluralLabel = "Universitetlar";

    protected static ?string $model = University::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                ->schema([
                    Section::make([
                        Forms\Components\TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        Forms\Components\TextInput::make('address')
                            ->label('Address')
                            ->required(),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->required(),
                    ]),
                ]),
                Group::make()
                ->schema([
                    Section::make([
                        Forms\Components\FileUpload::make('image_link')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->openable()
                            ->disk('public')
                            ->directory('universities')
                            ->label('Image')
                    ])
                ]),
                Section::make([
                    Forms\Components\MarkdownEditor::make('info')
                        ->label('Info')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                    Tables\Columns\TextColumn::make('name')->searchable(),
                    Tables\Columns\TextColumn::make('address')->limit(20),
                    Tables\Columns\TextColumn::make('website')->limit(20),
                    Tables\Columns\TextColumn::make('info')->limit(20),
                    Tables\Columns\ImageColumn::make('image_link')->label('image'),
                    Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
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
            'index' => Pages\ListUniversities::route('/'),
            'create' => Pages\CreateUniversity::route('/create'),
            'edit' => Pages\EditUniversity::route('/{record}/edit'),
        ];
    }
}
