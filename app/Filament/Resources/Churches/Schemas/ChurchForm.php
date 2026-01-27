<?php

namespace App\Filament\Resources\Churches\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ChurchForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			TextInput::make('name')->columnSpanFull()->required(),
			TextInput::make('street_address')->columnSpanFull(),
			TextInput::make('city'),
			TextInput::make('province'),
			TextInput::make('postal_code'),
			TextInput::make('phone_number')->tel(),
			TextInput::make('email')->label('Email address')->email(),
		]);
	}
}
