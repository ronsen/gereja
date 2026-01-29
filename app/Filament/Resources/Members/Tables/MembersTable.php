<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class MembersTable
{
	public static function configure(Table $table): Table
	{
		return $table
			->columns([
				TextColumn::make('name')->searchable()->sortable(),
				TextColumn::make('gender')->badge()->searchable(),
				TextColumn::make('joined_at')
					->date()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('baptized_at')
					->date()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
				TextColumn::make('confirmed_at')
					->date()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
			])
			->filters([
				TrashedFilter::make(),
			])
			->recordActions([
				EditAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
					ForceDeleteBulkAction::make(),
					RestoreBulkAction::make(),
				]),
			]);
	}
}
