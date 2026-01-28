<?php

namespace App\Filament\Resources\ServiceRoles\Pages;

use App\Filament\Resources\ServiceRoles\ServiceRoleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceRoles extends ListRecords
{
    protected static string $resource = ServiceRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
