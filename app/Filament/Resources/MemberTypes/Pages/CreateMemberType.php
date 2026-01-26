<?php

namespace App\Filament\Resources\MemberTypes\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\MemberTypes\MemberTypeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateMemberType extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = MemberTypeResource::class;

	protected function handleRecordCreation(array $data): Model
	{
		$data['user_id'] = Auth::user()->id;

		return parent::handleRecordCreation($data);
	}
}
