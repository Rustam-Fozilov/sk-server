<?php

namespace App\Filament\Resources\LikedResource\Pages;

use App\Filament\Resources\LikedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLiked extends CreateRecord
{
    protected static string $resource = LikedResource::class;
}
