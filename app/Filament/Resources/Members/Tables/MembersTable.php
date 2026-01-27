<?php

namespace App\Filament\Resources\Members\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class MembersTable
{
	public static function configure(Table $table): Table
	{
		return $table
			->columns([
				IconColumn::make('active')->boolean()->alignCenter(),
				TextColumn::make('church.name')
					->searchable()
					->toggleable(isToggledHiddenByDefault: false),
				TextColumn::make('memberType.name')
					->label('Type')
					->searchable()
					->toggleable(isToggledHiddenByDefault: false),
				TextColumn::make('name')->searchable(),
				TextColumn::make('gender')->badge()->searchable(),
				TextColumn::make('deleted_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
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
				SelectFilter::make('memberType')->relationship('memberType', 'name'),
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
