<?php

namespace App\Filament\Resources\SearchHistoryResource\Pages;

use App\Filament\Resources\SearchHistoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSearchHistories extends ListRecords
{
    protected static string $resource = SearchHistoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
