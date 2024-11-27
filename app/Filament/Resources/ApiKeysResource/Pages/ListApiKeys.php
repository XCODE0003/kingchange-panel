<?php

namespace App\Filament\Resources\ApiKeysResource\Pages;

use App\Filament\Resources\ApiKeysResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApiKeys extends ListRecords
{
    protected static string $resource = ApiKeysResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
