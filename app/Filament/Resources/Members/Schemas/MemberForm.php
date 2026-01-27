<?php

namespace App\Filament\Resources\Members\Schemas;

use App\Enums\Gender;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Section;
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
			ToggleButtons::make('gender')
				->options(Gender::class)
				->default(Gender::FEMALE)
				->inline()
				->required(),
			Toggle::make('active')->required()->default(true),
			Section::make('Birthday')
				->schema([
					TextInput::make('place_of_birth'),
					DatePicker::make('date_of_birth'),
				])
				->columns(2)
				->columnSpanFull(),
			Section::make('Address')
				->schema([
					TextInput::make('street_address'),
					TextInput::make('city'),
					TextInput::make('province'),
					TextInput::make('postal_code'),
					TextInput::make('phone_number')->tel(),
					TextInput::make('email')->label('Email address')->email(),
				])
				->columns(2)
				->columnSpanFull(),
		]);
	}
}
