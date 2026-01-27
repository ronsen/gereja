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
use Illuminate\Support\Facades\Auth;

class MemberForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			Select::make('church_id')
				->relationship(
					'church',
					'name',
					modifyQueryUsing: fn($query) => $query->where('user_id', Auth::user()->id),
				)
				->required()
				->default(fn() => Auth::user()?->church?->id),
			Select::make('member_type_id')
				->relationship(
					'memberType',
					'name',
					modifyQueryUsing: fn($query) => $query->where('user_id', Auth::user()->id),
				)
				->required(),
			TextInput::make('name')->required(),
			ToggleButtons::make('gender')
				->options(Gender::class)
				->default(Gender::FEMALE)
				->inline()
				->required(),
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
			Toggle::make('active')->required()->default(true)->columnSpanFull(),
		]);
	}
}
