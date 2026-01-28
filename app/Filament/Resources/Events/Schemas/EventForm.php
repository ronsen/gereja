<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class EventForm
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
			Select::make('event_type_id')
				->relationship('eventType', 'name')
				->label('Type')
				->required(),
			TextInput::make('name')->columnSpanFull()->required(),
			Textarea::make('description')->columnSpanFull(),
			TextInput::make('location')->columnSpanFull(),
		]);
	}
}
