<?php

namespace App\Filament\Resources\EventSessions\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\EventSessions\EventSessionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEventSession extends CreateRecord
{
	use RedirectToIndex;

    protected static string $resource = EventSessionResource::class;
}
