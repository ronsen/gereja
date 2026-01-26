<?php

namespace App\Filament\Resources\MemberTypes\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\MemberTypes\MemberTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMemberType extends EditRecord
{
	use RedirectToIndex;

	protected static string $resource = MemberTypeResource::class;

	protected function getHeaderActions(): array
	{
		return [
			DeleteAction::make(),
		];
	}
}
