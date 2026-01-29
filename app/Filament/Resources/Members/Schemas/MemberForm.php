<?php

namespace App\Filament\Resources\Members\Schemas;

use App\Enums\Gender;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
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
				->default(fn() => Auth::user()?->church?->id)
				->columnSpanFull(),
			Section::make('Personal')
				->schema([
					Grid::make(2)->schema([
						TextInput::make('name')->required()->columnSpanFull(),
						ToggleButtons::make('gender')
							->options(Gender::class)
							->default(Gender::FEMALE)
							->inline()
							->required(),
						DatePicker::make('date_of_birth'),
					]),
					Grid::make(3)->schema([
						DatePicker::make('joined_at'),
						DatePicker::make('baptized_at'),
						DatePicker::make('confirmed_at'),
					]),
					Toggle::make('active')
						->default(true)
						->required()
						->columnSpanFull(),
				])
				->columnSpanFull(),
			Section::make('Address')
				->schema([
					Grid::make(2)->schema([
						TextInput::make('street_address'),
						TextInput::make('city'),
						TextInput::make('province'),
						TextInput::make('postal_code'),
					]),
				])
				->columnSpanFull(),

			Section::make('Contact')
				->schema([
					Grid::make(2)->schema([
						TextInput::make('phone_number')->tel(),
						TextInput::make('email')->label('Email address')->email(),
					]),
				])
				->columnSpanFull(),
		]);
	}
}
