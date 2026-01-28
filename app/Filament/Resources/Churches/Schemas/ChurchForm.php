<?php

namespace App\Filament\Resources\Churches\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ChurchForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			Section::make('Church')
				->schema([
					Grid::make(2)->schema([
						TextInput::make('name')->required(),
						DatePicker::make('established_at'),
					]),
				])
				->columnSpanFull(),
			Section::make('Address')
				->schema([
					Grid::make(2)->schema([
						TextInput::make('street_address')->columnSpanFull(),
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
