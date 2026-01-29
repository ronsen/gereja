<?php

namespace App\Filament\Resources\EventSessions\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SongsRelationManager extends RelationManager
{
	protected static string $relationship = 'songs';

	public function form(Schema $schema): Schema
	{
		return $schema->components([
			TextInput::make('title')->columnSpanFull()->required(),
			Textarea::make('content')->columnSpanFull(),
			TextInput::make('sort_order')
				->required()
				->numeric()
				->columnSpanFull()
				->default(10),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('title')
			->columns([
				TextColumn::make('title')->searchable(),
				TextColumn::make('sort_order')
					->alignRight()
					->numeric()
					->sortable(),
			])
			->filters([
				//
			])
			->headerActions([
				CreateAction::make()->modalWidth('lg'),
			])
			->recordActions([
				EditAction::make()->modalWidth('lg'),
				DeleteAction::make(),
			])
			->toolbarActions([
				BulkActionGroup::make([
					DeleteBulkAction::make(),
				]),
			]);
	}
}
