<?php

namespace App\Filament\Resources\ServiceRoles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceRoleForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			TextInput::make('name')->required()->columnSpanFull(),
		]);
	}
}
