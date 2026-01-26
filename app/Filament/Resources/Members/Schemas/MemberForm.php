<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MemberForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			Select::make('church_id')->relationship('church', 'name')->required(),
			Select::make('member_type_id')
				->relationship('memberType', 'name')
				->required(),
			TextInput::make('name')->required(),
			TextInput::make('street'),
			TextInput::make('city'),
			TextInput::make('province'),
			TextInput::make('postal_code'),
			TextInput::make('phone_number')->tel(),
			TextInput::make('email')->label('Email address')->email(),
			Toggle::make('active')->required(),
		]);
	}
}
