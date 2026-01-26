<?php

namespace App\Filament\Resources\Churches\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\Churches\ChurchResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateChurch extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = ChurchResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		$data['user_id'] = Auth::user()->id;

		return parent::handleRecordCreation($data);
	}
}
