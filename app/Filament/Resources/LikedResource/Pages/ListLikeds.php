<?php

namespace App\Filament\Resources\LikedResource\Pages;

use App\Filament\Resources\LikedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLikeds extends ListRecords
{
    protected static string $resource = LikedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function mount(): void
    {
        if (is_null($this->getTableSortColumn())) {
            $this->tableSortColumn = 'id';
            $this->tableSortDirection = 'desc';
        }
    }
}
