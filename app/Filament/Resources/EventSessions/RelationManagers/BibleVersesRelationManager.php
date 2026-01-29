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
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BibleVersesRelationManager extends RelationManager
{
	protected static string $relationship = 'bibleVerses';

	public function form(Schema $schema): Schema
	{
		return $schema->components([
			Grid::make(3)
				->schema([
					TextInput::make('book')->required(),
					TextInput::make('chapter')->required(),
					TextInput::make('verse')->required(),
				])
				->columnSpanFull(),
			Textarea::make('content')->columnSpanFull(),
			TextInput::make('sort_order')
				->required()
				->numeric()
				->default(10)
				->columnSpanFull(),
		]);
	}

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('book')
			->columns([
				TextColumn::make('book')->searchable(),
				TextColumn::make('chapter')->alignRight()->searchable(),
				TextColumn::make('verse')->alignRight()->searchable(),
				TextColumn::make('sort_order')
					->numeric()
					->alignRight()
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
