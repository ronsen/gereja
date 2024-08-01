<?php

namespace App\Filament\Resources;

use App\Enums\EventTypePattern;
use App\Filament\Resources\EventTypeResource\Pages;
use App\Filament\Resources\EventTypeResource\RelationManagers;
use App\Models\EventType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventTypeResource extends Resource
{
	protected static ?string $model = EventType::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationGroup = 'Kegiatan';

	protected static ?string $modelLabel = 'Tipe Kegiatan';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama')
					->required(),
				Forms\Components\ToggleButtons::make('pattern')
					->label('Pola')
					->inline()
					->options(EventTypePattern::class)
					->default(EventTypePattern::NONE),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('pattern')
					->label('Pola')
					->badge(),
				Tables\Columns\TextColumn::make('name')->label('Nama'),
			])
			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])
			->defaultSort('name', 'asc');
	}

	public static function getRelations(): array
	{
		return [
			RelationManagers\EventsRelationManager::class,
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListEventTypes::route('/'),
			'create' => Pages\CreateEventType::route('/create'),
			'edit' => Pages\EditEventType::route('/{record}/edit'),
		];
	}
}
