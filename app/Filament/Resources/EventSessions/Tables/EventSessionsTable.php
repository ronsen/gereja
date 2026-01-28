<?php

namespace App\Filament\Resources\EventSessions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventSessionsTable
{
	public static function configure(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('event.name')->searchable(),
				TextColumn::make('session_date')->date()->sortable(),
				TextColumn::make('start_time')->time()->sortable(),
				TextColumn::make('end_time')->time()->sortable(),
				TextColumn::make('created_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->filters([
				//
			])
			->recordActions([
				EditAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				]),
			]);
	}
}
