<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
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

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')->required(),
				Forms\Components\Select::make('category_id')
					->relationship('category', 'name')
					->required(),
				Forms\Components\DateTimePicker::make('event_date')->required(),
				Forms\Components\TextInput::make('address'),
				Forms\Components\Textarea::make('description')->columnSpanFull(),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('name'),
				Tables\Columns\TextColumn::make('category.name'),
				Tables\Columns\TextColumn::make('event_date')->dateTime(),
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
			])
			->defaultSort('event_date', 'desc');
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
