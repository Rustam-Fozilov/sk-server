<?php

namespace App\Filament\Resources\UniversityResource\Pages;

use App\Filament\Resources\UniversityResource;
use App\Services\FileService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUniversity extends EditRecord
{
    protected static string $resource = UniversityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        if ($this->getRecord()->image_link !== $this->record->image_link) {
            (new FileService())->deleteByPath($this->getRecord()->image_link);
        }
    }
}
