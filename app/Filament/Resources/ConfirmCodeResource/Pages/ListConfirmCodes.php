<?php

namespace App\Filament\Resources\ConfirmCodeResource\Pages;

use App\Filament\Resources\ConfirmCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfirmCodes extends ListRecords
{
    protected static string $resource = ConfirmCodeResource::class;

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
