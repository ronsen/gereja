<?php

namespace App\Filament\Resources\EventTypes\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\EventTypes\EventTypeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateEventType extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = EventTypeResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		$data['user_id'] = Auth::user()->id;

		return parent::handleRecordCreation($data);
	}
}
