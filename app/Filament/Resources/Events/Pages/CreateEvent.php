<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\Events\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = EventResource::class;
}
