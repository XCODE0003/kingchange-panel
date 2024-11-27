<?php

namespace App\Filament\Resources\ApiKeysResource\Pages;

use App\Filament\Resources\ApiKeysResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateApiKeys extends CreateRecord
{
    protected static string $resource = ApiKeysResource::class;
}
