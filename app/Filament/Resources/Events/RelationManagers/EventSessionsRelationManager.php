<?php

namespace App\Filament\Resources\Events\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventSessionsRelationManager extends RelationManager
{
	protected static string $relationship = 'eventSessions';

	public function form(Schema $schema): Schema
	{
		return $schema->components([
			DatePicker::make('session_date')->required()->columnSpanFull(),
			TimePicker::make('start_time')->columnSpanFull(),
			TimePicker::make('end_time')->columnSpanFull(),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('session_date')
			->columns([
				TextColumn::make('session_date')->date()->sortable(),
				TextColumn::make('start_time')->time(),
				TextColumn::make('end_time')->time(),
			])
			->filters([
				//
			])
			->headerActions([
				CreateAction::make()->modalWidth('xl'),
			])
			->recordActions([
				EditAction::make(),
				DeleteAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				]),
			])
			->defaultSort('session_date', 'asc');
	}
}
