<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
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
				TextColumn::make('frequency')->badge(),
				TextColumn::make('name')->searchable(),
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
