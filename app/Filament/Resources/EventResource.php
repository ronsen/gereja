<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\EventType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
	protected static ?string $model = Event::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	protected static ?string $navigationGroup = 'Kegiatan';

	protected static ?string $modelLabel = 'Kegiatan';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama')
					->required(),
				Forms\Components\Select::make('event_type_id')
					->label('Tipe kegiatan')
					->relationship('eventType', 'name')
					->required(),
				Forms\Components\DateTimePicker::make('start_at')
					->label('Mulai')
					->default(now())
					->required(),
				Forms\Components\DateTimePicker::make('end_at')
					->label('Berakhir')
					->default(now()->addHours(2))
					->required(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name')
					->label('Nama')
					->searchable(),
				Tables\Columns\TextColumn::make('eventType.name')->label('Tipe kegiatan'),
				Tables\Columns\TextColumn::make('start_at')
					->label('Mulai')
					->dateTime(),
				Tables\Columns\TextColumn::make('end_at')
					->label('Berakhir')
					->dateTime(),
			])
			->filters([
				Tables\Filters\TrashedFilter::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
					Tables\Actions\ForceDeleteBulkAction::make(),
					Tables\Actions\RestoreBulkAction::make(),
				]),
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListEvents::route('/'),
			'create' => Pages\CreateEvent::route('/create'),
			'edit' => Pages\EditEvent::route('/{record}/edit'),
		];
	}

	public static function getEloquentQuery(): Builder
	{
		return parent::getEloquentQuery()
			->withoutGlobalScopes([
				SoftDeletingScope::class,
			]);
	}
}
