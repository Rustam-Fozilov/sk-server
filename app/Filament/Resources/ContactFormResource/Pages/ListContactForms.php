<?php

namespace App\Filament\Resources\ContactFormResource\Pages;

use App\Filament\Resources\ContactFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactForms extends ListRecords
{
    protected static string $resource = ContactFormResource::class;

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
