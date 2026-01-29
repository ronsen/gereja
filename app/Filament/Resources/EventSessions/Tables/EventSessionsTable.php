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
				TextColumn::make('event.eventType.name')->label('Type')->searchable(),
				TextColumn::make('session_date')->date()->sortable(),
				TextColumn::make('start_time')->time('H:i')->sortable(),
				TextColumn::make('end_time')->time('H:i')->sortable(),
				TextColumn::make('total_offerings')->numeric()->alignRight(),
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
