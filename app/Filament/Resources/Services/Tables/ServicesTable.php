<?php

namespace App\Filament\Resources\Services\Tables;

use App\Enums\Frequency;
use App\Models\Service;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ServicesTable
{
	public static function configure(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('church.name')
					->searchable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('name')->searchable(),
				TextColumn::make('day_of_week')
					->sortable()
					->badge()
					->formatStateUsing(fn($state) => Service::DAYS[$state]),
				TextColumn::make('start_time')->time()->sortable(),
				TextColumn::make('end_time')->time()->sortable(),
			])
			->filters([])
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
