<?php

namespace App\Filament\Resources\SavedResource\Pages;

use App\Filament\Resources\SavedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSaved extends EditRecord
{
    protected static string $resource = SavedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
