<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\Frequency;
use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class ServiceForm
{
	public static function configure(Schema $schema): Schema
	{
		return $schema->components([
			Select::make('church_id')
				->relationship('church', 'name')
				->required()
				->columnSpanFull(),
			TextInput::make('name')->required(),
			ToggleButtons::make('day_of_week')
				->required()
				->options(Service::DAYS)
				->default(0)
				->inline()
				->columnSpanFull(),
			TimePicker::make('start_time'),
			TimePicker::make('end_time'),
		]);
	}
}
