<?php

namespace App\Filament\Resources\SavedResource\Pages;

use App\Filament\Resources\SavedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSaveds extends ListRecords
{
    protected static string $resource = SavedResource::class;

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
