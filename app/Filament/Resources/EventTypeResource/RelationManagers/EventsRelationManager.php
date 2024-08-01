<?php

namespace App\Filament\Resources\EventTypeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventsRelationManager extends RelationManager
{
	protected static string $relationship = 'events';

	protected static ?string $title = 'Kegiatan';

	public function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\TextInput::make('name')
					->label('Nama')
					->required()
					->columnSpanFull(),
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

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('name')
			->columns([
				Tables\Columns\TextColumn::make('name')->label('Nama'),
				Tables\Columns\TextColumn::make('start_at')
					->label('Mulai')
					->dateTime(),
				Tables\Columns\TextColumn::make('end_at')
					->label('Berakhir')
					->dateTime(),
			])
			->filters([
				//
			])
			->headerActions([
				Tables\Actions\CreateAction::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}
}
