<?php

namespace App\Filament\Resources\ServiceRoles\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\ServiceRoles\ServiceRoleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateServiceRole extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = ServiceRoleResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		$data['user_id'] = Auth::user()->id;

		return parent::handleRecordCreation($data);
	}
}
