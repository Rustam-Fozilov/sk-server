<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogTagResource\Pages;
use App\Models\BlogTag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogTagResource extends Resource
{
    protected static ?string $label = "Blog Teg";

    protected static ?string $pluralLabel = "Blog Teg";

    protected static ?string $model = BlogTag::class;

    protected static ?string $navigationIcon = 'heroicon-o-hashtag';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('blog_id')->label('Blog')->relationship('blog', 'title')->required(),
                Forms\Components\BelongsToSelect::make('tag_id')->label('Tag')->relationship('tag', 'name')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('blog.title')->limit(50)->searchable(),
                Tables\Columns\TextColumn::make('tag.name')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('blog_id')
                    ->label('Blog')
                    ->searchable()
                    ->options(fn () => \App\Models\Blog::query()->pluck('title', 'id')->toArray()),
                Tables\Filters\SelectFilter::make('tag_id')
                    ->label('Tag')
                    ->searchable()
                    ->options(fn () => \App\Models\Tag::query()->pluck('name', 'id')->toArray()),
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
            'index' => Pages\ListBlogTags::route('/'),
            'create' => Pages\CreateBlogTag::route('/create'),
            'edit' => Pages\EditBlogTag::route('/{record}/edit'),
        ];
    }
}
