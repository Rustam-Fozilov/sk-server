<?php

namespace App\Filament\Resources\LikedResource\Pages;

use App\Filament\Resources\LikedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLiked extends EditRecord
{
    protected static string $resource = LikedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
