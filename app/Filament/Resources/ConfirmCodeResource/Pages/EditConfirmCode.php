<?php

namespace App\Filament\Resources\ConfirmCodeResource\Pages;

use App\Filament\Resources\ConfirmCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfirmCode extends EditRecord
{
    protected static string $resource = ConfirmCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
