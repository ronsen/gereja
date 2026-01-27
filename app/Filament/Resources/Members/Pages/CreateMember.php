<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\Members\MemberResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMember extends CreateRecord
{
	use RedirectToIndex;

	protected static string $resource = MemberResource::class;
}
