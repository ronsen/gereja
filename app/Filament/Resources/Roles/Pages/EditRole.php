<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\RedirectToIndex;
use App\Filament\Resources\Roles\RoleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRole extends EditRecord
{
	use RedirectToIndex;

	protected static string $resource = RoleResource::class;

	protected function getHeaderActions(): array
	{
		return [
			DeleteAction::make(),
		];
	}
}
