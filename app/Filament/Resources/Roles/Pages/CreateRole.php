<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateRole extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = RoleResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		$data['user_id'] = Auth::user()->id;

		return parent::handleRecordCreation($data);
	}
}
