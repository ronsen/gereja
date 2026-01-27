<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Enums\Frequency;
use App\Models\Church;
use App\Models\Service;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class ServiceForm
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
			TextInput::make('name')->required(),
			ToggleButtons::make('frequency')
				->options(Frequency::class)
				->inline()
				->reactive()
				->columnSpanFull(),
			ToggleButtons::make('day_of_week')
				->required()
				->options([
					0 => 'Sunday',
					1 => 'Monday',
					2 => 'Tuesday',
					3 => 'Wednesday',
					4 => 'Thursday',
					5 => 'Friday',
					6 => 'Saturday',
				])
				->default(0)
				->inline()
				->columnSpanFull()
				->visible(fn($get) => $get('frequency') === Frequency::WEEKLY)
				->required(fn($get) => $get('frequency') === Frequency::WEEKLY),
			TextInput::make('day_of_month')
				->numeric()
				->minValue(1)
				->maxValue(31)
				->helperText('Example: 15 (every 15th)')
				->columnSpanFull()
				->visible(fn($get) => $get('frequency') === Frequency::MONTHLY)
				->required(fn($get) => $get('frequency') === Frequency::MONTHLY),

			Grid::make()
				->visible(fn($get) => $get('frequency') === Frequency::YEARLY)
				->schema([
					TextInput::make('day_of_year')
						->numeric()
						->minValue(1)
						->maxValue(31)
						->required(fn($get) => $get('frequency') === Frequency::YEARLY),
					Select::make('month_of_year')
						->options([
							1 => 'January',
							2 => 'February',
							3 => 'March',
							4 => 'April',
							5 => 'May',
							6 => 'June',
							7 => 'July',
							8 => 'August',
							9 => 'September',
							10 => 'October',
							11 => 'November',
							12 => 'December',
						])
						->required(fn($get) => $get('frequency') === Frequency::YEARLY),
				])
				->columnSpanFull(),

			TimePicker::make('starts_at')->seconds(false),
			TimePicker::make('ends_at')->seconds(false),
		]);
	}
}
