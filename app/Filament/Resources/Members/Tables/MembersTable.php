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
				TextColumn::make('church.name')->searchable(),
				TextColumn::make('memberType.name')->searchable(),
				TextColumn::make('name')->searchable(),
				TextColumn::make('street')->searchable(),
				TextColumn::make('city')->searchable(),
				TextColumn::make('province')->searchable(),
				TextColumn::make('postal_code')->searchable(),
				TextColumn::make('phone_number')->searchable(),
				TextColumn::make('email')->label('Email address')->searchable(),
				IconColumn::make('active')->boolean(),
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
