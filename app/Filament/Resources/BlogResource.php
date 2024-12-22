<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogResource extends Resource
{
    protected static ?string $label = "Blog";

    protected static ?string $pluralLabel = "Blog";

    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make([
                        Forms\Components\TextInput::make('title')->label('Title')->required(),
                        Forms\Components\TextInput::make('read_minute')->numeric()->required(),
                        Forms\Components\Select::make('tags')
                            ->label('Tags')
                            ->multiple()
                            ->relationship('tags', 'name')
                            ->required(),
                    ])
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make([
                        Forms\Components\MarkdownEditor::make('content')->required(),
                        Forms\Components\FileUpload::make('image_link')
                            ->required()
                            ->image()
                            ->openable()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('blogs')
                            ->label('Image'),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('title')->searchable()->limit(20),
                Tables\Columns\TextColumn::make('content')->searchable()->limit(20),
                Tables\Columns\TextColumn::make('read_minute'),
                Tables\Columns\ImageColumn::make('image_link')->label('Image'),
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
