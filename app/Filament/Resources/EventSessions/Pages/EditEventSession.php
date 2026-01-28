<?php

namespace App\Filament\Resources\EventSessions\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\EventSessions\EventSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEventSession extends EditRecord
{
	use RedirectToIndex;

    protected static string $resource = EventSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
