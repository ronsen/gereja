<?php

namespace App\Filament\Resources\ServiceRoles\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\ServiceRoles\ServiceRoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceRole extends EditRecord
{
	use RedirectToIndex;

    protected static string $resource = ServiceRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
